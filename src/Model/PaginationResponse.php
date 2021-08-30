<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class PaginationResponse
{
    /**
     * @var int
     */
    public $current_page;

    /**
     * @var int
     */
    public $last_page;

    /**
     * @var int
     */
    public $rows;

    /**
     * @var array
     */
    public $data = [];

}