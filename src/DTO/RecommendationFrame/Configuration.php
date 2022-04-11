<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Navigation;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

/**
 * Class Configuration
 *
 * @package Cyberkonsultant
 */
class Configuration
{
    /**
     * @var Matrix|null
     */
    protected $matrix = null;

    /**
     * @var EnabledElements|null
     */
    protected $enabledElements = null;

    /**
     * @var Navigation|null
     */
    protected $navigation = null;

    /**
     * @var Text|null
     */
    protected $text = null;

    /**
     * @var Frame|null
     */
    protected $frame = null;

    /**
     * @return Matrix|null
     */
    public function getMatrix(): ?Matrix
    {
        return $this->matrix;
    }

    /**
     * @return EnabledElements|null
     */
    public function getEnabledElements(): ?EnabledElements
    {
        return $this->enabledElements;
    }

    /**
     * @return Navigation|null
     */
    public function getNavigation(): ?Navigation
    {
        return $this->navigation;
    }

    /**
     * @return Text|null
     */
    public function getText(): ?Text
    {
        return $this->text;
    }

    /**
     * @return Frame|null
     */
    public function getFrame(): ?Frame
    {
        return $this->frame;
    }

    /**
     * @param Matrix $matrix
     */
    public function setMatrix(Matrix $matrix): void
    {
        $this->matrix = $matrix;
    }

    /**
     * @param EnabledElements $enabledElements
     */
    public function setEnabledElements(EnabledElements $enabledElements): void
    {
        $this->enabledElements = $enabledElements;
    }

    /**
     * @param Navigation $navigation
     */
    public function setNavigation(Navigation $navigation): void
    {
        $this->navigation = $navigation;
    }

    /**
     * @param Text $text
     */
    public function setText(Text $text): void
    {
        $this->text = $text;
    }

    /**
     * @param Frame $frame
     */
    public function setFrame(Frame $frame): void
    {
        $this->frame = $frame;
    }
}