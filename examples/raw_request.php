#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$frameId = 'ba304539-ba7d-4df6-a877-e539143065ba';
$userId = '0c4243fb-0c2d-4699-bde9-969e48181b79';

$response = $sdk->get('/shop/frames/ready/'.$frameId.'/'.$userId);
dump(
    json_decode($response->raw_body)
);