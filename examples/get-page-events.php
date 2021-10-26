#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$crm = $sdk->getCrmScope();

dump(
    $crm->pageEvent->get([
        'page' => 1,
    ])
);