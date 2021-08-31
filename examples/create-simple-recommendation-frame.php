#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    dump(
        $shop->createRecommendationFrame(\Cyberkonsultant\Model\RecommendationFrame::create(
            'Test recommendation frame',
            [
                'embedding' => [
                    'xpath' => '/html/body/div[3]/div/div[3]'
                ],
                'matrix' => [
                    'columns' => 8,
                    'rows' => 2
                ],
                'product_view' => 'complex',
                'number_of_products' => 16,
                'navigation' => [
                    'enabled' => true,
                    'style' => 'shape_1',
                    'width' => '32px'
                ],
                'container' => [
                    'width' => '100%',
                    'height' => '300px',
                    'border_weight' => '2px',
                    'border_color' => '#000'
                ],
                'group_id' => "90a42fc6-5dc0-4e92-93d1-0d704e2f4166",
            ]
        ))
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}