<?php
include __DIR__.'/../vendor/autoload.php';

use Cyberkonsultant\Cyberkonsultant;

$sdk = new Cyberkonsultant([
    'api_url' => 'http://localhost:3000',
    'access_token' => ''
]);
