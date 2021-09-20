<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\CRUD\CallCRUD;
use Cyberkonsultant\Cyberkonsultant;

/**
 * Class Voice
 *
 * @package Cyberkonsultant
 */
class Voice
{
    /**
     * @var Cyberkonsultant
     */
    protected $cyberkonsultant;

    /**
     * @var CallCRUD
     */
    public $call;

    /**
     * Shop constructor.
     *
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
        $this->call = new CallCRUD($this->cyberkonsultant);
    }
}