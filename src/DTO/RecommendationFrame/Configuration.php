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
 * @package Cyberkonsultant\DTO
 */
class Configuration
{
    /**
     * @var Matrix
     */
    protected $matrix;

    /**
     * @var EnabledElements
     */
    protected $enabledElements;

    /**
     * @var Navigation
     */
    protected $navigation;

    /**
     * @var Text
     */
    protected $text;

    /**
     * @var Frame
     */
    protected $frame;

    /**
     * RecommendationFrameConfiguration constructor.
     * @param Matrix $matrix
     * @param EnabledElements $enabledElements
     * @param Navigation $navigation
     * @param Text $text
     * @param Frame $frame
     */
    public function __construct(
        Matrix $matrix,
        EnabledElements $enabledElements,
        Navigation $navigation,
        Text $text,
        Frame $frame
    ) {
        $this->matrix = $matrix;
        $this->enabledElements = $enabledElements;
        $this->navigation = $navigation;
        $this->text = $text;
        $this->frame = $frame;
    }

    /**
     * @return Matrix
     */
    public function getMatrix(): Matrix
    {
        return $this->matrix;
    }

    /**
     * @return EnabledElements
     */
    public function getEnabledElements(): EnabledElements
    {
        return $this->enabledElements;
    }

    /**
     * @return Navigation
     */
    public function getNavigation(): Navigation
    {
        return $this->navigation;
    }

    /**
     * @return Text
     */
    public function getText(): Text
    {
        return $this->text;
    }

    /**
     * @return Frame
     */
    public function getFrame(): Frame
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