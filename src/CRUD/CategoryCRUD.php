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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
}