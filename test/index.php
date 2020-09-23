<?php

require __DIR__ . '/../vendor/autoload.php';

use Notification\Email;

$novoEmail = new Email(
    2, 
    "smtpi.kinghost.net", 
    "jorgealmir@drevekcontabil.com.br", 
    "Fortuito1964", 
    "tls", 
    "587", 
    "jorgealmir@drevekcontabil.com.br", 
    "Jorge Almir Martins"
);

$novoEmail->sendMail(
    "Assunto de Teste",
    "<p>Esse é um email de <b>teste</b></p>",
    "jorge@drevekcontabil.com.br",
    "Jorge (Reply)",
    "jorgealmirmartins@gmail.com",
    "Jorge (Destinatário)"
);

var_dump($novoEmail);
