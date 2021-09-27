<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\CategoryAssembler;
use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\DTO\Category;
use Cyberkonsultant\DTO\SuccessResponse;

/**
 * Class CategoryCRUD
 *
 * @package Cyberkonsultant
 */
class CategoryCRUD extends BaseCRUD
{
    /**
     * @return array
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(): array
    {
        $response = $this->cyberkonsultant->get('/shop/categories');
        $categoryAssembler = new CategoryAssembler();

        return array_map(static function ($category) use ($categoryAssembler) {
            return $categoryAssembler->writeDTO($category);
        }, $this->cyberkonsultant->parseResponse($response));
    }

    /**
     * @param Category $category
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Category $category): SuccessResponse
    {
        $categoryAssembler = new CategoryAssembler();
        $response = $this->cyberkonsultant->post('/shop/categories', [
            'json' => [$categoryAssembler->readDTO($category)]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    /**
     * @param array $categories
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function createMany(array $categories): SuccessResponse
    {
        $categoryAssembler = new CategoryAssembler();
        $response = $this->cyberkonsultant->post('/shop/categories', [
            'json' => array_map(static function($category) use ($categoryAssembler) {
                return $categoryAssembler->readDTO($category);
            }, $categories)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    /**
     * @param string $shopCategoryId
     * @param string|null $associateTo
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function associate(string $shopCategoryId, ?string $associateTo = null): SuccessResponse
    {
        $response = $this->cyberkonsultant->post('/shop/categories/associate', [
            'json' => [
                [
                    'shop_category_id' => $shopCategoryId,
                    'associate_to' => $associateTo,
                ]
            ]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    public function associateMany(array $associations): SuccessResponse
    {
        $associationsCategories = [];
        foreach ($associations as $shopCategoryId => $associateTo) {
            $associationsCategories[] = [
                'shop_category_id' => $shopCategoryId,
                'associate_to' => $associateTo,
            ];
        }
        $response = $this->cyberkonsultant->post('/shop/categories/associate', [
            'json' => $associationsCategories
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }
}