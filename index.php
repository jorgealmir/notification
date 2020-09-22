<?php

require __DIR__ . '/vendor/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail();
