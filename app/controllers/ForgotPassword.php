<?php

use PHPMailer\PHPMailer\PHPMailer;



//Require PHP Mailer
require APPROOT.'/libraries/vendor/autoload.php';

class forgotPassword extends Controller{
    private $forgotPasswordModel;
    private $userModel;
    private $mail;
    
    public function __construct() {
        $this->forgotPasswordModel = $this->model('M_Forgot_password');
        $this->userModel = $this->model('M_Users'); // Make sure you have a M_Users model
        $this->mail = new PHPMailer(true);
    }


    public function sendEmail(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $usersEmail = trim($_POST['email']);

        $data = [];

        if(empty($usersEmail)){
            // flash("reset", "Please input email");
            $data['email'] = $usersEmail;
            $data['email_err'] = "Please input email";
            $this->view('users/v_forgot_password', $data);
            return ;
            // redirect("../ecotrade/users/forgot_password");
        }
        if (!$this->userModel->findUserByEmail($usersEmail)) {
            // flash("reset", "Email not found ");

            $data['email'] = $usersEmail;
            $data['email_err'] = "Email not found ";
         
            $this->view('users/v_forgot_password', $data);
            return ;
            // redirect("../ecotrade/users/forgot_password");
        }

        // Check if 'selector' and 'validator' are set in $_POST
        $selector = isset($_POST['selector']) ? $_POST['selector'] : '';
        $validator = isset($_POST['validator']) ? $_POST['validator'] : '';

        $url = "localhost/ecotrade/forgotpassword/reset_password";
        // $url = "localhost/ecotrade/users/reset_password?selector=.$selector.&validator=.$validator";

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587; // Use 587 for TLS, 465 for SSL
        $this->mail->Username = 'ecotrade46@gmail.com';
        $this->mail->Password = 'inua qsto hwfo seiy';

        //Can Send Email Now
        $subject = "Reset your password";
        $message = "<p>We recieved a password reset request.</p>";
        $message .= "<p>Here is your password reset link: </p>";
        $message .= "<a href='".$url."'>".$url."</a>";

        $this->mail->setFrom('ecotrade46@gmail.com', $subject);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($usersEmail);
        $this->mail->send();

        flash("reset", "Check your email");
        redirect("../ecotrade/users/forgot_password");
    }

    public function reset_password() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Validate the new password and confirm password
            $newPassword = isset($_POST['newPassword']) ? trim($_POST['newPassword']) : '';
            
            $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
    
            // Initialize an array to store validation errors
            $errors = [];
    
            if (empty($newPassword)) {
                
                $errors['newPassword'] = 'New password cannot be empty.';
            } elseif (strlen($newPassword) < 6) {
                $errors['newPassword'] = 'New password must be at least 6 characters.';
            }
    
            if (empty($confirmPassword)) {
                $errors['confirmPassword'] = 'Please confirm your new password.';
            } elseif ($newPassword !== $confirmPassword) {
                $errors['confirmPassword'] = 'New password and confirm password do not match.';
            }
    
            // Check if there are any validation errors
            if (empty($errors)) {
                // Call the updatePassword method in your model to update the user's password
                if ($this->userModel->resetPassword($user_id, $newPassword)) {
                    
                    flash('newReset', 'Password updated successfully');
                    redirect("../ecotrade/users/login");
                } else {
                    // Error occurred during password update
                    die('Something went wrong while updating the password');
                }
            } else {
                // There are validation errors, re-display the form with error messages
                $data = [
                    
                    'errors' => $errors
                ];
                $this->view('users/v_Reset_newpassword', $data);
            }
        } else {
            // Display the password reset form
            $this->view('users/v_Reset_newpassword');
        }
    }
      



    // public function resetPassword(){


    //     $selector = isset($_GET['selector']) ? $_GET['selector'] : '';
    //     $validator = isset($_GET['validator']) ? $_GET['validator'] : '';

    //     // Construct the URL for redirection
    //     $url = '../v_Reset_newpassword.php?selector=' . $selector . '&validator=' . $validator;

    //     if(empty($_POST['pwd'] || $_POST['pwd-repeat'])){
    //         flash("newReset", "Please fill out all fields");
    //         redirect("../views/v_Reset_newpassword");
    //     }else if($data['pwd'] != $data['pwd-repeat']){
    //         flash("newReset", "Passwords do not match");
    //         redirect("views/v_Reset_newpassword");
    //     }else if(strlen($data['pwd']) < 6){
    //         flash("newReset", "Invalid password");
    //         redirect("views/v_Reset_newpassword");
    //     }

    //     $currentDate = date("U");
    //     if (!$row = $this->forgotPasswordModel->resetPassword($data['selector'], $currentDate)) {
    //         flash("newReset", "Sorry. The link is no longer valid");
    //         redirect($url);
    //     }

    //     $tokenBin = hex2bin($data['validator']);
    //     $tokenCheck = password_verify($tokenBin, $row->pwdResetToken);
    //     if(!$tokenCheck){
    //         flash("newReset", "You need to re-Submit your reset request");
    //         redirect($url);
    //     }

    //     $tokenEmail = $row->pwdResetEmail;
    //     if(!$this->userModel->findUserByEmailOrUsername($tokenEmail, $tokenEmail)){
    //         flash("newReset", "There was an error");
    //         redirect($url);
    //     }

    //     $newPwdHash = password_hash($data['pwd'], PASSWORD_DEFAULT);
    //     if(!$this->userModel->resetPassword($newPwdHash, $tokenEmail)){
    //         flash("newReset", "There was an error");
    //         redirect($url);
    //     }

    //     if(!$this->forgotPasswordModel->deleteEmail($tokenEmail)){
    //         flash("newReset", "There was an error");
    //         redirect($url);
    //     }

    //     flash("newReset", "Password Updated", 'form-message form-message-green');
    //     redirect($url);
    // }
}