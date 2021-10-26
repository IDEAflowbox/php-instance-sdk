<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PageEventAssembler;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\DTO\PageEvent;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class EventCRUD
 *
 * @package Cyberkonsultant
 */
class PageEventCRUD extends BaseCRUD
{
    /**
     * @param array $query
     * @return ListResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(array $query = []): ListResponse
    {
        $response = $this->cyberkonsultant->get('/crm/page-events', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $pageEventAssembler = new PageEventAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($pageEventAssembler) {
                return $pageEventAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param PageEvent $pageEvent
     * @return PageEvent
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(PageEvent $pageEvent): PageEvent
    {
        $pageEventAssembler = new PageEventAssembler();
        $response = $this->cyberkonsultant->post('/crm/page-events', [
            'json' => $pageEventAssembler->readDTO($pageEvent)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, PageEventAssembler::class);
    }
}