<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\GroupAssembler;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\ProductAssembler;
use Cyberkonsultant\DTO\Group;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class GroupCRUD
 *
 * @package Cyberkonsultant
 */
class GroupCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/shop/groups', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $groupAssembler = new GroupAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($groupAssembler) {
                return $groupAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param Group $group
     * @return Group
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Group $group): Group
    {
        $groupAssembler = new GroupAssembler();
        $response = $this->cyberkonsultant->post('/shop/groups', [
            'json' => $groupAssembler->readDTO($group)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, GroupAssembler::class);
    }

    /**
     * @param string $groupId
     * @param array $query
     * @return ListResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function getProducts(string $groupId, array $query = []): ListResponse
    {
        $response = $this->cyberkonsultant->get(
            sprintf('/shop/groups/%s/products', $groupId),
            ['query' => $query]
        );
        $assembler = new PaginationResponseAssembler();
        $productAssembler = new ProductAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($productAssembler) {
                return $productAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param string $groupId
     * @return array
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function getProductsIds(string $groupId): array
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/groups/%s/products-ids', $groupId));
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $groupId
     * @return array
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function getProductsCodes(string $groupId): array
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/groups/%s/products-codes', $groupId));
        return json_decode($response->getBody()->getContents());
    }
}