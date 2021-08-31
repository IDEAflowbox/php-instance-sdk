#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    dump(
        $shop->createRecommendationFrame(\Cyberkonsultant\Model\RecommendationFrame::createSimple(
            'Simple frame test',
            '/html/body/div[3]/div/div[3]',
            16,
            [
                'matrix' => [
                    'columns' => 8,
                    'rows' => 2,
                ],
                'enabled_elements' => [
                    'thumbnail' => true,
                    'button' => true,
                    'contents' => true,
                ],
                'navigation' => [
                    'size' => '32px',
                    'style' => 'shape_3',
                    'color' => '#000',
                ],
                'text' => [
                    'product_contents' => '{{nazwa}} {{opis}}',
                    'button' => '<strong>Kup teraz!</strong>',
                ],
                'frame' => [
                    'dimensions' => [
                        'width' => '100%',
                        'height' => '300px',
                        'margin_top' => '0',
                        'margin_bottom' => '0',
                        'margin_side' => '0',
                        'space_between_elements' => '0',
                    ],
                    'border_radius' => 0,
                    'style' => [
                        'background_color' => '#000',
                        'border_color' => '#000',
                        'border_color_on_hover' => '#000',
                    ],
                    'image_style' => [
                        'height' => '120px',
                        'background_color' => '#fff',
                    ],
                    'button' => [
                        'dimensions' => [
                            'width' => 'auto',
                            'height' => 'auto',
                        ],
                        'border_radius' => 0,
                        'position' => 'center',
                        'background_color' => '#000',
                        'text_color' => '#fff',
                    ],
                ],
            ],
            "90a42fc6-5dc0-4e92-93d1-0d704e2f4166"
        ))
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}