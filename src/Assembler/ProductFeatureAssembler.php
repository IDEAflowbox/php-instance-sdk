<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\ProductFeature;

/**
 * Class ProductFeatureAssembler
 *
 * @package Cyberkonsultant
 */
class ProductFeatureAssembler implements DataAssemblerInterface
{
    /**
     * @param ProductFeature $productFeatureDTO
     * @return array
     */
    public function readDTO(ProductFeature $productFeatureDTO): array
    {
        return [
            'feature_id' => $productFeatureDTO->getFeatureId(),
            'choice_id' => $productFeatureDTO->getChoiceId(),
        ];
    }

    /**
     * @param array $productFeature
     * @return ProductFeature
     */
    public function writeDTO(array $productFeature): ProductFeature
    {
        $productFeatureDTO = new ProductFeature();
        $productFeatureDTO->setFeatureId($productFeature['feature_id']);
        $productFeatureDTO->setChoiceId($productFeature['choice_id']);
        return $productFeatureDTO;
    }
}