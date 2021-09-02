<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Cyberkonsultant;

/**
 * Class BaseCRUD
 *
 * @package Cyberkonsultant
 */
abstract class BaseCRUD
{
    /**
     * @var Cyberkonsultant
     */
    protected $cyberkonsultant;

    /**
     * BaseCRUD constructor.
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
    }
}