<?php

namespace Notification;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

class Email 
{
    /** @var stdClass */
    private $mail;

    public function __construct(
        $smtpDebug, 
        $host,
        $user,
        $pass,
        $smtpSecure,
        $port,
        $setFromEmail,
        $setFromName
    ) {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $user;
        $this->mail->Password = $pass;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port = $port;
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML();
        $this->mail->setFrom($setFromEmail, $setFromName);
    }
    
    public function sendMail(
        $subject, 
        $body, 
        $replyEmail, 
        $replyName, 
        $addressEmail, 
        $addressName
    ) {
        $this->mail->Subject = (string) $subject;
        $this->mail->Body = $body;
        
        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);
        
        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}
