<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\PageEvent;

/**
 * Interface PagePageEventBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface PageEventBuilderInterface
{
    /**
     * @param string $userId
     * @return PageEventBuilderInterface
     */
    public function setUserId(string $userId): PageEventBuilderInterface;

    /**
     * @param string $productId
     * @return PageEventBuilderInterface
     */
    public function setProductId(string $productId): PageEventBuilderInterface;

    /**
     * @param string $frameId
     * @return PageEventBuilderInterface
     */
    public function setFrameId(string $frameId): PageEventBuilderInterface;

    /**
     * @param string $type
     * @return PageEventBuilderInterface
     */
    public function setType(string $type): PageEventBuilderInterface;

    /**
     * @param string $url
     * @return PageEventBuilderInterface
     */
    public function setUrl(string $url): PageEventBuilderInterface;

    /**
     * @return PageEvent
     */
    public function getResult(): PageEvent;
}