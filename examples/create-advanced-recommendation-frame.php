#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

$recommendationFrameTemplateHtml = <<<EOL
<div class="ck-frame" style="font-size: 18px;">
    <div class="ck-frame--navigation" style="display: none;">
        <a href="#" class="ck-frame--navigation-left">&nbsp;</a>
        <a href="#" class="ck-frame--navigation-right">&nbsp;</a>
    </div>

    <div class="ck-frame--products" style="display: flex;flex-wrap: wrap;">
        {{#each products}}
        <!-- Product -->
        <div class="ck-frame--product" style="flex: 1 calc(25% - 20px);min-width: 0;margin: 20px 10px;">
            <div class="ck-frame--product-thumb" style="text-align: center;">
                <a href="{{url}}" target="_blank" title="{{name}}">
                    <img src="{{image}}" alt="{{name}}" style="height: 150px;">
                </a>
            </div>

            <div class="ck-frame--product-container">
                <div class="ck-frame--price-box">
                    <span class="regular-price">
                        <span class="price" style="font-size: 24px;">{{price}}&nbsp;<span class="currency">zł</span></span>
                    </span>
                </div>
                <div class="ck-frame--product-name" style="font-size: 18px;color: inherit;text-transform: uppercase;margin: 5px 0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-decoration: none;">
                    <a href="{{url}}" style="text-decoration: none;color: inherit;">{{name}}</a>
                </div>
                <div class="ck-frame--product-actions">
                    <a href="{{url}}" class="ck-frame--product-button" style="color: #000;text-decoration: none;text-transform: uppercase;font-weight: bold;font-size: 15px;">Zobacz</a>
                </div>
            </div>
        </div>
        <!-- End Product -->
        {{/each}}
    </div>
</div>
EOL;

try {
    dump(
        $shop->createRecommendationFrame(\Cyberkonsultant\Model\RecommendationFrame::createAdvanced(
            'Advanced frame test',
            '/html/body/div[3]/div/div[3]',
            16,
            $recommendationFrameTemplateHtml,
            "90a42fc6-5dc0-4e92-93d1-0d704e2f4166"
        ))
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}