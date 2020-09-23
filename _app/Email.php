<?php

namespace Notification;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

class Email 
{
    /** @var stdClass */
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
//        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = 'smtpi.kinghost.net';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'jorgealmir@drevekcontabil.com.br';
        $this->mail->Password = 'Fortuito1964';
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = 587;
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML();
        $this->mail->setFrom('jorgealmir@drevekcontabil.com.br', 'Jorge Almir Martins');
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
