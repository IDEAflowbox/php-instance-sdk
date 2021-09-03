#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\RecommendationFrameBuilder;

$shop = $sdk->getShopScope();

try {
    $builder = new RecommendationFrameBuilder();
    $frame = $builder
        ->buildSimpleRecommendationFrame()
        ->setName('Simple frame test')
        ->setXPath('/html/body/div[3]/div/div[3]')
        ->setGroupId("90a42fc6-5dc0-4e92-93d1-0d704e2f4166")
        ->setNumberOfProducts(16)
        ->getConfigurationBuilder()
            ->getMatrixBuilder()
                ->setRows(8)
                ->setColumns(2)
            ->endMatrixBuilder()
            ->getEnabledElementsBuilder()
                ->setThumbnail(true)
                ->setContents(true)
                ->setButton(true)
            ->endEnabledElementsBuilder()
            ->getNavigationBuilder()
                ->setStyle('shape_3')
                ->setColor('#000')
                ->setSize('32px')
            ->endNavigationBuilder()
            ->getTextBuilder()
                ->setProductContents('{{nazwa}} {{opis}}')
                ->setButton('<strong>Kup teraz!</strong>')
            ->endTextBuilder()
            ->getFrameBuilder()
                ->setBorderRadius(0)
                ->getDimensionsBuilder()
                    ->setWidth('100%')
                    ->setHeight('300px')
                    ->setMarginTop('0')
                    ->setMarginBottom('0')
                    ->setMarginSide('0')
                    ->setSpaceBetweenElements('0')
                ->endDimensionsBuilder()
                ->getStyleBuilder()
                    ->setBackgroundColor('#000')
                    ->setBorderColor('#000')
                    ->setBorderColorOnHover('#000')
                ->endStyleBuilder()
                ->getImageStyleBuilder()
                    ->setHeight('120px')
                    ->setBackgroundColor('#fff')
                ->endImageStyleBuilder()
                ->getButtonBuilder()
                    ->getDimensionsBuilder()
                        ->setWidth('auto')
                        ->setHeight('auto')
                    ->endDimensionsBuilder()
                    ->setBorderRadius(0)
                    ->setPosition('center')
                    ->setBackgroundColor('#000')
                    ->setTextColor('#000')
                ->endButtonBuilder()
            ->endFrameBuilder()
        ->getResult()
    ;

    $shop->recommendationFrame->create($frame);

    dump($frame);
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}