<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\UserAssembler;
use Cyberkonsultant\DTO\User;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class UserCRUD
 *
 * @package Cyberkonsultant
 */
class UserCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/shop/users', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $userAssembler = new UserAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($userAssembler) {
                return $userAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param string $id
     * @return User
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function find(string $id): User
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/users/%s', $id));
        return $this->cyberkonsultant->getEdgeResponse($response, UserAssembler::class);
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function update(User $user)
    {
        $userAssembler = new UserAssembler();
        $response = $this->cyberkonsultant->put(sprintf('/shop/users/%s', $user->getId()), [
            'json' => $userAssembler->readDTO($user)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, UserAssembler::class);
    }
}