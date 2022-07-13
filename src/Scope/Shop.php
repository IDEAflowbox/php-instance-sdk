<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\CRUD\CategoryCRUD;
use Cyberkonsultant\CRUD\EventCRUD;
use Cyberkonsultant\CRUD\FeatureCRUD;
use Cyberkonsultant\CRUD\GroupCRUD;
use Cyberkonsultant\CRUD\ProductCRUD;
use Cyberkonsultant\CRUD\ProductsTransactionCRUD;
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
     * @var ProductsTransactionCRUD
     */
    public $productsTransaction;

    /**
     * @var GroupCRUD
     */
    public $group;

    /**
     * @var CategoryCRUD
     */
    public $category;

    /**
     * @var FeatureCRUD
     */
    public $feature;

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
        $this->product = new ProductCRUD($this->cyberkonsultant);
        $this->productsTransaction = new ProductsTransactionCRUD($this->cyberkonsultant);
        $this->group = new GroupCRUD($this->cyberkonsultant);
        $this->category = new CategoryCRUD($this->cyberkonsultant);
        $this->feature = new FeatureCRUD($this->cyberkonsultant);
    }
}