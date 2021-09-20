#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$voice = $sdk->getVoiceScope();

dump(
    $voice->call->get()
);