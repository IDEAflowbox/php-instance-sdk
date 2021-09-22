<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Feature;

use Cyberkonsultant\Builder\FeatureBuilderInterface;
use Cyberkonsultant\Builder\GroupBuilderInterface;
use Cyberkonsultant\DTO\Feature\Choice;

/**
 * Class ChoiceBuilder
 *
 * @package Cyberkonsultant
 */
class ChoiceBuilder implements ChoiceBuilderInterface
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
     * @param string $id
     * @return ChoiceBuilderInterface
     */
    public function setId(string $id): ChoiceBuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return ChoiceBuilderInterface
     */
    public function setName(string $name): ChoiceBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Choice
     */
    public function getResult(): Choice
    {
        return new Choice(
            $this->id,
            $this->name
        );
    }
}