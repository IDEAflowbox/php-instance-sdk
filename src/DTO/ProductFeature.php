<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class ProductFeature
 *
 * @package Cyberkonsultant
 */
class ProductFeature
{
    /**
     * @var string
     */
    protected $featureId;

    /**
     * @var string
     */
    protected $choiceId;

    /**
     * ProductFeature constructor.
     * @param string $featureId
     * @param string $choiceId
     */
    public function __construct(string $featureId, string $choiceId)
    {
        $this->featureId = $featureId;
        $this->choiceId = $choiceId;
    }

    /**
     * @return string
     */
    public function getFeatureId(): string
    {
        return $this->featureId;
    }

    /**
     * @param string $featureId
     */
    public function setFeatureId(string $featureId): void
    {
        $this->featureId = $featureId;
    }

    /**
     * @return string
     */
    public function getChoiceId(): string
    {
        return $this->choiceId;
    }

    /**
     * @param string $choiceId
     */
    public function setChoiceId(string $choiceId): void
    {
        $this->choiceId = $choiceId;
    }
}