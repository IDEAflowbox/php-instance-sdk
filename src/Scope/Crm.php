<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\CRUD\MessageCRUD;
use Cyberkonsultant\CRUD\PageEventCRUD;
use Cyberkonsultant\CRUD\SegmentCRUD;
use Cyberkonsultant\CRUD\SenderCRUD;
use Cyberkonsultant\Cyberkonsultant;

/**
 * Class Crm
 *
 * @package Cyberkonsultant
 */
class Crm
{
    /**
     * @var Cyberkonsultant
     */
    protected $cyberkonsultant;

    /**
     * @var PageEventCRUD
     */
    public $pageEvent;

    /**
     * @var SegmentCRUD
     */
    public $segment;

    /**
     * @var SenderCRUD
     */
    public $sender;

    /**
     * @var MessageCRUD
     */
    public $message;

    /**
     * Shop constructor.
     *
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
        $this->pageEvent = new PageEventCRUD($this->cyberkonsultant);
        $this->segment = new SegmentCRUD($this->cyberkonsultant);
        $this->sender = new SenderCRUD($this->cyberkonsultant);
        $this->message = new MessageCRUD($this->cyberkonsultant);
    }
}