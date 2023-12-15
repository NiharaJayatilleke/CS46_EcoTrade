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
        $selector = bin2hex(random_bytes(8));
        $validator = bin2hex(random_bytes(32));

        $expires = time() + 3600;

        // $this->forgotPasswordModel->storePasswordResetToken($usersEmail, $selector, $token, $expires);
        $this->forgotPasswordModel->storePasswordResetToken($usersEmail, $selector, $validator, $expires);

        // $url = "localhost/ecotrade/forgotpassword/reset_password?selector=$selector&validator=$token";
        $url = "localhost/ecotrade/forgotpassword/reset_password?selector=$selector&validator=$validator";

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
        // $tokenData = null;
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['selector']) && isset($_GET['validator'])) {
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
    
            $tokenData = $this->forgotPasswordModel->getPasswordResetToken($selector);
    
            // if ($tokenData && hash_equals($tokenData['pwdresetToken'], $validator)) {
            if ($tokenData && hash_equals($tokenData->pwdresetToken, $validator)) {
                // Token is valid, display the password reset form
                $this->view('users/v_Reset_newpassword', ['selector' => $selector]);
            } else {
                // Token is invalid or not found
                die('Invalid token');
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $selector = null;
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Validate the new password and confirm password
            $selector = isset($_POST['selector']) ? trim($_POST['selector']) : '';
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
                    'selector' => $selector,
                    'errors' => $errors
                ];
                $this->view('users/v_Reset_newpassword', $data);
            }
        } else {
            // Display the password reset form
            $this->view('users/v_Reset_newpassword');
        }
    } 
}
