<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Feature;

use Cyberkonsultant\Builder\FeatureBuilderInterface;
use Cyberkonsultant\DTO\Feature\Choice;

/**
 * Interface ChoiceBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ChoiceBuilderInterface
{
    /**
     * @param string $id
     * @return ChoiceBuilderInterface
     */
    public function setId(string $id): ChoiceBuilderInterface;
    /**
     * @param string $name
     * @return ChoiceBuilderInterface
     */
    public function setName(string $name): ChoiceBuilderInterface;

    /**
     * @return Choice
     */
    public function getResult(): Choice;
}