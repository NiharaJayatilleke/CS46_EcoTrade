<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../models/M_Forgot_password.php';
require_once '../helpers/Session_Helper.php';
require_once '../models/M_Users.php';
//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

class ResetPasswords{
    private $resetModel;
    private $userModel;
    private $mail;
    
    public function __construct(){
        $this->resetModel = new M_Forgot_password;
        $this->userModel = new M_Users;
        //Setup PHPMailer
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '1006762a04bd51';
        $phpmailer->Password = '0fb4b6124d8537';
    }

    public function sendEmail(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $usersEmail = trim($_POST['email']);

        if(empty($usersEmail)){
            flash("reset", "Please input email");
            redirect("../views/v_forgot_password.php");
        }

        if(!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)){
            flash("reset", "Invalid email");
            redirect("../views/v_forgot_password.php");
        }
        //Will be used to query the user from the database
        $selector = bin2hex(random_bytes(8));
        //Will be used for confirmation once the database entry has been matched
        $token = random_bytes(32);
        //URL will vary depending on where the website is being hosted from
        $url = 'http://localhost/ecotrade/users/create-new-password.php?selector='.$selector.'&validator='.bin2hex($token);
        //Expiration date will last for half an hour
        $expires = date("U") + 1800;
        if(!$this->resetModel->deleteEmail($usersEmail)){
            die("There was an error");
        }
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        if(!$this->resetModel->insertToken($usersEmail, $selector, $hashedToken, $expires)){
            die("There was an error");
        }
        //Can Send Email Now
        $subject = "Reset your password";
        $message = "<p>We recieved a password reset request.</p>";
        $message .= "<p>Here is your password reset link: </p>";
        $message .= "<a href='".$url."'>".$url."</a>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($usersEmail);

        $this->mail->send();

        flash("reset", "Check your email", 'form-message form-message-green');
        redirect("../views/v_forgot_password.php");
    }

    public function resetPassword(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'selector' => trim($_POST['selector']),
            'validator' => trim($_POST['validator']),
            'pwd' => trim($_POST['pwd']),
            'pwd-repeat' => trim($_POST['pwd-repeat'])
        ];
        $url = '../create-new-password.php?selector='.$data['selector'].'&validator='.$data['validator'];

        if(empty($_POST['pwd'] || $_POST['pwd-repeat'])){
            flash("newReset", "Please fill out all fields");
            redirect($url);
        }else if($data['pwd'] != $data['pwd-repeat']){
            flash("newReset", "Passwords do not match");
            redirect($url);
        }else if(strlen($data['pwd']) < 6){
            flash("newReset", "Invalid password");
            redirect($url);
        }

        $currentDate = date("U");
        if(!$row = $this->resetModel->resetPassword($data['selector'], $currentDate)){
            flash("newReset", "Sorry. The link is no longer valid");
            redirect($url);
        }

        $tokenBin = hex2bin($data['validator']);
        $tokenCheck = password_verify($tokenBin, $row->pwdResetToken);
        if(!$tokenCheck){
            flash("newReset", "You need to re-Submit your reset request");
            redirect($url);
        }

        $tokenEmail = $row->pwdResetEmail;
        if(!$this->userModel->findUserByEmailOrUsername($tokenEmail, $tokenEmail)){
            flash("newReset", "There was an error");
            redirect($url);
        }

        $newPwdHash = password_hash($data['pwd'], PASSWORD_DEFAULT);
        if(!$this->userModel->resetPassword($newPwdHash, $tokenEmail)){
            flash("newReset", "There was an error");
            redirect($url);
        }

        if(!$this->resetModel->deleteEmail($tokenEmail)){
            flash("newReset", "There was an error");
            redirect($url);
        }

        flash("newReset", "Password Updated", 'form-message form-message-green');
        redirect($url);
    }
}

$init = new ResetPasswords;

//Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'send':
            $init->sendEmail();
            break;
        case 'reset':
            $init->resetPassword();
            break;
        default:
        header("location: ../index.php");
    }
}else{
    header("location: ../index.php");
}