<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\CRUD\EventCRUD;
use Cyberkonsultant\CRUD\GroupCRUD;
use Cyberkonsultant\CRUD\ProductCRUD;
use Cyberkonsultant\CRUD\RecommendationFrameCRUD;
use Cyberkonsultant\CRUD\UserCRUD;
use Cyberkonsultant\Cyberkonsultant;

/**
 * Class Shop
 *
 * @package Cyberkonsultant
 */
class Shop
{
    /**
     * @var Cyberkonsultant
     */
    protected $cyberkonsultant;

    /**
     * @var RecommendationFrameCRUD
     */
    public $recommendationFrame;

    /**
     * @var EventCRUD
     */
    public $event;

    /**
     * @var UserCRUD
     */
    public $user;

    /**
     * @var ProductCRUD
     */
    public $product;

    /**
     * @var ProductCRUD
     */
    public $feed;

    /**
     * @var GroupCRUD
     */
    public $group;

    /**
     * Shop constructor.
     *
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
        $this->recommendationFrame = new RecommendationFrameCRUD($this->cyberkonsultant);
        $this->event = new EventCRUD($this->cyberkonsultant);
        $this->user = new UserCRUD($this->cyberkonsultant);
        $this->product = $this->feed = new ProductCRUD($this->cyberkonsultant);
        $this->group = new GroupCRUD($this->cyberkonsultant);
    }
}