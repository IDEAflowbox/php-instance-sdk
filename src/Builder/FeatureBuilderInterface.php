<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\Feature\ChoiceBuilderInterface;
use Cyberkonsultant\Builder\Group\CriteriaBuilderInterface;
use Cyberkonsultant\DTO\Event;
use Cyberkonsultant\DTO\Feature;
use Cyberkonsultant\DTO\Feature\Choice;
use Cyberkonsultant\DTO\Group;

/**
 * Interface FeatureBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface FeatureBuilderInterface
{
    /**
     * @param string $id
     * @return FeatureBuilderInterface
     */
    public function setId(string $id): FeatureBuilderInterface;

    /**
     * @param string $name
     * @return FeatureBuilderInterface
     */
    public function setName(string $name): FeatureBuilderInterface;

    /**
     * @param Choice $choice
     * @return FeatureBuilderInterface
     */
    public function addChoice(Choice $choice): FeatureBuilderInterface;

    /**
     * @return Feature
     */
    public function getResult(): Feature;
}