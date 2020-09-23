<?php

require __DIR__ . '/vendor/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail(
    "Assunto de Teste",
    "<p>Esse é um email de <b>teste</b></p>",
    "jorge@drevekcontabil.com.br",
    "Jorge (Reply)",
    "jorgealmirmartins@gmail.com",
    "Jorge (Destinatário)"
);

var_dump($novoEmail);
