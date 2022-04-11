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
            'name' => $categoryDTO->getName(),
            'url' => $categoryDTO->getUrl(),
            'image' => $categoryDTO->getImage(),
            'associated_to' => $categoryDTO->getAssociatedTo(),
        ];
    }

    /**
     * @param array $category
     * @return Category
     */
    public function writeDTO(array $category): Category
    {
        $categoryDto = new Category();
        $categoryDto->setId($category['id']);
        $categoryDto->setName($category['name']);
        $categoryDto->setUrl($category['url']);
        $categoryDto->setImage($category['image']);
        if (isset($category['associated_to'])) {
            $categoryDto->setAssociatedTo($category['associated_to']);
        }
        return $categoryDto;
    }
}