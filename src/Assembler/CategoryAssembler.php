<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Category;

/**
 * Class CategoryAssembler
 *
 * @package Cyberkonsultant
 */
class CategoryAssembler implements DataAssemblerInterface
{
    /**
     * @param Category $categoryDTO
     * @return array
     */
    public function readDTO(Category $categoryDTO): array
    {
        return [
            'id' => $categoryDTO->getId(),
            'real_id' => $categoryDTO->getRealId(),
            'name' => $categoryDTO->getName(),
            'url' => $categoryDTO->getUrl(),
            'image' => $categoryDTO->getImage(),
        ];
    }

    /**
     * @param array $category
     * @return Category
     */
    public function writeDTO(array $category): Category
    {
        return new Category(
            $category['id'],
            $category['real_id'],
            $category['name'],
            $category['url'],
            $category['image']
        );
    }
}