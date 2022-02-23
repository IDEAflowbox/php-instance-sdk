#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$misc = $sdk->getMiscScope();

dump(
    $misc->settings->update('nai_limit', 50)
);