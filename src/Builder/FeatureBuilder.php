<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Feature;
use Cyberkonsultant\DTO\Feature\Choice;

/**
 * Class FeatureBuilder
 *
 * @package Cyberkonsultant
 */
class FeatureBuilder implements FeatureBuilderInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Choice[]
     */
    protected $choices = [];

    /**
     * @param string $id
     * @return FeatureBuilderInterface
     */
    public function setId(string $id): FeatureBuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return FeatureBuilderInterface
     */
    public function setName(string $name): FeatureBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param Choice $choice
     * @return FeatureBuilderInterface
     */
    public function addChoice(Choice $choice): FeatureBuilderInterface
    {
        $this->choices[] = $choice;
        return $this;
    }

    /**
     * @return Feature
     */
    public function getResult(): Feature
    {
        return new Feature(
            $this->id,
            $this->name,
            $this->choices
        );
    }
}