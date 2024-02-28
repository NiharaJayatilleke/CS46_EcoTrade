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
            $data['email_err'] = "Please Input Email";
            $this->view('users/forgot_password', $data);
            return ;
           
        }

        $user_id=$this->userModel->findUserByEmail($usersEmail);
        if (!$user_id) {
            // flash("reset", "Email not found ");
            $data['email'] = $usersEmail;
            $data['email_err'] = "Email not found ";
            
            $this->view('users/forgot_password', $data);
            return ;
         
        }

        $selector = bin2hex(random_bytes(8));
        $validator = bin2hex(random_bytes(32));

        $expires = time() + 60*2;//expires in 2 minutes

        $this->forgotPasswordModel->storePasswordResetToken($usersEmail, $selector, $validator, $expires);

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
        // $message = "<p>Dear $username,</p>";
        $message = "<p>Dear user,</p>";
        // $message = "Dear {$data['username']},\n\n";
        $message .= "<p>We received a request to reset your password. If this was not you, please ignore this email.</p>";
        $message .= "<p>To reset your password, click on the following link:</p>";
        $message .= "<a href='".$url."'>Reset Password</a>";
         // $message .= "<a href='".$url."'>".$url."</a>";
        $message .= "<p>This link is valid for a limited time only. If you do not reset your password within this time frame, you may need to request another reset link.</p>";
        // $message .= "<p>If you have any questions or concerns, please contact us at support@example.com.</p>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>Best Regards,<br>The EcoTrade Team</p>";
        // $message .= "<script>window.open('$url', '_blank');</script>";  // open the link in a new tab


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
        $user_id = null;
        $user_email = null;
        // $tokenData = null;
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['selector']) && isset($_GET['validator'])) {
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            
            $tokenData = $this->forgotPasswordModel->getPasswordResetToken($selector);
    
            if ($tokenData && hash_equals($tokenData->pwdresetToken, $validator)) {
                // Token is valid, display the password reset form
                $this->view('users/reset_newpassword', ['selector' => $selector]);
            } else {
                // Token is invalid or not found
                die('The password reset link has expired. Please request a new one.');

            }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $selector = null;
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Validate the new password and confirm password
            $newPassword = isset($_POST['newPassword']) ? trim($_POST['newPassword']) : '';
            $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
           
            $selector = isset($_GET['selector']) ? trim($_GET['selector']) : '';
            $validator = isset($_GET['validator']) ? trim($_GET['validator']) : '';
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

            if (empty($errors)) {
                $tokenData = $this->forgotPasswordModel->getPasswordResetToken($selector);

                // Check if $tokenData is truthy (not false or null)
                if ($tokenData && hash_equals($tokenData->pwdresetToken, $validator)) {
                    $usersEmail = $tokenData->pwdResetemail;

                    // Find the user by email
                    $user_id = $this->userModel->findUserByEmail($usersEmail);

                    // Check if $user_id is truthy (not false or null)
                    if ($user_id) {
                        // Call the updatePassword method in your model to update the user's password
                        if ($this->userModel->resetPassword($user_id, $newPassword)) {
                            flash('newReset', 'Password updated successfully');
                            redirect("../ecotrade/users/login");
                        } else {
                            // Error occurred during password update
                            die('Something went wrong while updating the password');
                        }
                    } else {
                        // User not found
                        die('User not found.');
                    }
                } else {
                    // Token is invalid or not found
                    die('The password reset link has expired. Please request a new one.');
                }
            } else {
                // There are validation errors, re-display the form with error messages
                $data = [
                    'selector' => $selector,
                    'validator' => $validator,
                    'errors' => $errors,
                    'user_id' => $user_id,
                ];
                $this->view('users/reset_newpassword', $data);
            }

        } else {
            // Display the password reset form
            $this->view('users/reset_newpassword');
        }
    } 
}
