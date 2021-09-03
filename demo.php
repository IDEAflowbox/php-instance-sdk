<?php
include __DIR__.'/vendor/autoload.php';

use Cyberkonsultant\Cyberkonsultant;
use Cyberkonsultant\Builder\RecommendationFrameBuilder;

$sdk = new Cyberkonsultant([
    'api_url' => 'http://localhost:3000',
    'access_token' => 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJBY2Nlc3NUb2tlbiI6IjA2ZDdiMWIzMDkzZjhhNzUyNGJiMzhjM2E5MzAwMzNkODA4ZjM5ZTZhNjZlYjc2ZTJlNmM0OTg5NjMzZjZjZmMiLCJOYW1lIjoiVm9pY2VNb2R1bGUifQ.REshovSI6SThPQ0PUj-ieflZiRJEnK-Tg5XUM727Ei4PSbXdNqQao9454ASugrmPAc-AeIwxAPJBpLOZ7j9IMgNEaFQkbzweq_untpkqikRJBcHhdJ8KdG703YGqE37abdvjqc9sM6WhlGUcOUDJmMQFXjXQ5jbKjABpg5v0jV6rNBbLpkeXQpxtH7XKW7gdTE8glA5tvqb2NGUxSHNEy6SW02F1udu6ZCnAIc2JTHbi--rwVJEf-khBlS19xtj5BjnLRaKedylsq8mdcz1g9yb1duMAT0njIF2uzZhgjqd055hq5C4E8dtIktEruf_60tlsqraE9OrRGaEown1WeO-cE0q8PMSU-aj7kgaBpJ1jSeI2TyT-nUyLiy6tlqZpcIIMCQTPikEdlwAYLsMdAZV7BU0fylmE_et2ep0Hlg-IT3sOv1_96LBPDDpu3SLj5r9Rhlmjp9aratkwlFGS1JATmrWcb9XwfxX5ZyIDKPaxMxrUZMKZR4QeHavrfOpvMMUnAMBLeMG5CuNWkwCO85MLuubMdesUdCmi-BquVh6wv-5M2UzDS1rncwYvkdZuMwIis0ZIRr_qFjibfgvl6pdjazOKurkHULRe0fwYeZvouYumUWyxcglUR4lyM8oqLYWeYeyCqHO8DXck23qossogbBjomfh0Ty9D0aTh5nY'
]);

$shop = $sdk->getShopScope();
//dump($shop->recommendationFrame->get());

//$recommendationFrameTemplateHtml = <<<EOL
//<div class="ck-frame" style="font-size: 18px;">
//    <div class="ck-frame--navigation" style="display: none;">
//        <a href="#" class="ck-frame--navigation-left">&nbsp;</a>
//        <a href="#" class="ck-frame--navigation-right">&nbsp;</a>
//    </div>
//
//    <div class="ck-frame--products" style="display: flex;flex-wrap: wrap;">
//        {{#each products}}
//        <!-- Product -->
//        <div class="ck-frame--product" style="flex: 1 calc(25% - 20px);min-width: 0;margin: 20px 10px;">
//            <div class="ck-frame--product-thumb" style="text-align: center;">
//                <a href="{{url}}" target="_blank" title="{{name}}">
//                    <img src="{{image}}" alt="{{name}}" style="height: 150px;">
//                </a>
//            </div>
//
//            <div class="ck-frame--product-container">
//                <div class="ck-frame--price-box">
//                    <span class="regular-price">
//                        <span class="price" style="font-size: 24px;">{{price}}&nbsp;<span class="currency">zł</span></span>
//                    </span>
//                </div>
//                <div class="ck-frame--product-name" style="font-size: 18px;color: inherit;text-transform: uppercase;margin: 5px 0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-decoration: none;">
//                    <a href="{{url}}" style="text-decoration: none;color: inherit;">{{name}}</a>
//                </div>
//                <div class="ck-frame--product-actions">
//                    <a href="{{url}}" class="ck-frame--product-button" style="color: #000;text-decoration: none;text-transform: uppercase;font-weight: bold;font-size: 15px;">Zobacz</a>
//                </div>
//            </div>
//        </div>
//        <!-- End Product -->
//        {{/each}}
//    </div>
//</div>
//EOL;
//
//$builder = new RecommendationFrameBuilder();
//$frame = $builder->buildAdvancedRecommendationFrame();
//$frame->setName('Advanced frame test');
//$frame->setXPath('/html/body/div[3]/div/div[3]');
//$frame->setGroupId("90a42fc6-5dc0-4e92-93d1-0d704e2f4166");
//$frame->setNumberOfProducts(16);
//$frame->setCustomHtml($recommendationFrameTemplateHtml);
//
//dd($frame->getResult());

$builder = new RecommendationFrameBuilder();
$frame = $builder->buildSimpleRecommendationFrame();
$frame->setName('Simple frame test');
$frame->setXPath('/html/body/div[3]/div/div[3]');
$frame->setGroupId("90a42fc6-5dc0-4e92-93d1-0d704e2f4166");
$frame->setNumberOfProducts(16);
$frame
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
;
$shop->recommendationFrame->create($frame->getResult());


//$configuration->getMatrixBuilder()->setColumns(6);
//$configuration->getMatrixBuilder()->setRows(2);

dd($frame->getResult());