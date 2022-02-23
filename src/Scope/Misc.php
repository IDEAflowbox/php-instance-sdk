<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\CRUD\MessageCRUD;
use Cyberkonsultant\CRUD\PageEventCRUD;
use Cyberkonsultant\CRUD\SegmentCRUD;
use Cyberkonsultant\CRUD\SenderCRUD;
use Cyberkonsultant\CRUD\SettingsCRUD;
use Cyberkonsultant\Cyberkonsultant;

/**
 * Class Misc
 *
 * @package Cyberkonsultant
 */
class Misc
{
    /**
     * @var Cyberkonsultant
     */
    protected $cyberkonsultant;

    /**
     * @var SettingsCRUD
     */
    public $settings;

    /**
     * Shop constructor.
     *
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
        $this->settings = new SettingsCRUD($cyberkonsultant);
    }
}