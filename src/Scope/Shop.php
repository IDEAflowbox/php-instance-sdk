<?php
declare(strict_types=1);

namespace Cyberkonsultant\Scope;

use Cyberkonsultant\Cyberkonsultant;
use Cyberkonsultant\Model\Category;
use Cyberkonsultant\Model\Event;
use Cyberkonsultant\Model\Group;
use Cyberkonsultant\Model\PaginationResponse;
use Cyberkonsultant\Model\Product;
use Cyberkonsultant\Model\RecommendationFrame;
use Cyberkonsultant\Model\User;

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
     * Shop constructor.
     *
     * @param Cyberkonsultant $cyberkonsultant
     */
    public function __construct(Cyberkonsultant $cyberkonsultant)
    {
        $this->cyberkonsultant = $cyberkonsultant;
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getEvents($query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get('/shop/events', ['query' => $query]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param Event $event
     * @return Event
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createEvent(Event $event): Event
    {
        $response = $this->cyberkonsultant->post('/shop/events', ['json' => [
            'event_type' => $event->event_type,
            'product_id' => $event->product_id,
            'user_id' => $event->user_id,
            'price' => $event->price,
        ]]);

        return $this->cyberkonsultant->map($response->getBody()->getContents(), Event::class);
    }

    /**
     * @param User $user
     * @return User
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateUser(User $user): User
    {
        $response = $this->cyberkonsultant->put(sprintf('/shop/users/%s', $user->id), ['json' => [
            'username' => $user->username,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'sex' => $user->sex,
        ]]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), User::class);
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUsers(array $query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get('/shop/users', ['query' => $query]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param string $id
     * @return User
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUser(string $id): User
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/users/%s', $id));
        return $this->cyberkonsultant->map($response->getBody()->getContents(), User::class);
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProducts(array $query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get('/shop/feed', ['query' => $query]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param array $products
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProducts(array $products): void
    {
        $json = [];
        /** @var Product $product */
        foreach ($products as $product) {
            $categories = [];
            /** @var Category $category */
            foreach ($product->categories as $category) {
                $categories[] = ['real_id' => $category->real_id];
            }
            $json[] = [
                'code' => $product->code,
                'name' => $product->name,
                'description' => $product->description,
                'net_price' => $product->net_price,
                'gross_price' => $product->gross_price,
                'url' => $product->url,
                'image' => $product->image,
                'categories' => $categories
            ];
        }

        $this->cyberkonsultant->post('/shop/feed', ['json' => $json]);
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFeed(array $query = []): PaginationResponse
    {
        return $this->getProducts($query);
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroups(array $query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get('/shop/groups', ['query' => $query]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param Group $group
     * @return Group
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addGroup(Group $group): Group
    {
        $filters = [];

        foreach ($group->criteria->filters as $filter) {
            $filters[] = [
                'field' => $filter->field,
                'operator' => $filter->operator,
                'value' => $filter->value,
            ];
        }

        $response = $this->cyberkonsultant->post('/shop/groups', ['json' => [
            'name' => $group->name,
            'criteria' => [
                'filters' => $filters
            ]
        ]]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), Group::class);
    }

    /**
     * @param string $groupId
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupProducts(string $groupId, array $query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get(
            sprintf('/shop/groups/%s/products', $groupId),
            ['query' => $query]
        );
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param string $groupId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupProductsIds(string $groupId): array
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/groups/%s/products-ids', $groupId));
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $groupId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupProductsCodes(string $groupId): array
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/groups/%s/products-codes', $groupId));
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param array $query
     * @return PaginationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendationFrames(array $query = []): PaginationResponse
    {
        $response = $this->cyberkonsultant->get('/shop/frames', ['query' => $query]);
        return $this->cyberkonsultant->map($response->getBody()->getContents(), PaginationResponse::class);
    }

    /**
     * @param RecommendationFrame $recommendationFrame
     * @return RecommendationFrame
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createRecommendationFrame(RecommendationFrame $recommendationFrame): RecommendationFrame
    {
        $response = $this->cyberkonsultant->post('/shop/frames', ['json' => [
            'name' => $recommendationFrame->name,
            'group_id' => $recommendationFrame->group_id,
            'frame_type' => $recommendationFrame->frame_type,
            'number_of_products' => $recommendationFrame->number_of_products,
            'custom_html' => $recommendationFrame->custom_html,
            'xpath' => $recommendationFrame->xpath,
            'configuration' => count($recommendationFrame->configuration) ? $recommendationFrame->configuration : null,
        ]]);

        return $this->cyberkonsultant->map($response->getBody()->getContents(), RecommendationFrame::class);
    }

    /**
     * @param RecommendationFrame $recommendationFrame
     * @return RecommendationFrame
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateRecommendationFrame(RecommendationFrame $recommendationFrame): RecommendationFrame
    {
        $response = $this->cyberkonsultant->put(sprintf('/shop/frames/%s', $recommendationFrame->id), ['json' => [
            'name' => $recommendationFrame->name,
            'group_id' => $recommendationFrame->group_id,
            'frame_type' => $recommendationFrame->frame_type,
            'number_of_products' => $recommendationFrame->number_of_products,
            'custom_html' => $recommendationFrame->custom_html,
            'xpath' => $recommendationFrame->xpath,
            'configuration' => count($recommendationFrame->configuration) ? $recommendationFrame->configuration : null,
        ]]);

        return $this->cyberkonsultant->map($response->getBody()->getContents(), RecommendationFrame::class);
    }
}