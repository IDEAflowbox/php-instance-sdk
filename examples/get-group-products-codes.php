#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->getGroupProductsCodes("90a42fc6-5dc0-4e92-93d1-0d704e2f4166")
);