<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\FeatureAssembler;
use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\DTO\Feature;
use Cyberkonsultant\DTO\SuccessResponse;

/**
 * Class FeatureCRUD
 *
 * @package Cyberkonsultant
 */
class FeatureCRUD extends BaseCRUD
{
    /**
     * @return array
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(): array
    {
        $response = $this->cyberkonsultant->get('/shop/features');
        $featureAssembler = new FeatureAssembler();

        return array_map(static function ($feature) use ($featureAssembler) {
            return $featureAssembler->writeDTO($feature);
        }, $this->cyberkonsultant->parseResponse($response));
    }

    /**
     * @param Feature $feature
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Feature $feature): SuccessResponse
    {
        $featureAssembler = new FeatureAssembler();
        $response = $this->cyberkonsultant->post('/shop/features', [
            'json' => [$featureAssembler->readDTO($feature)]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    /**
     * @param array $features
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function createMany(array $features): SuccessResponse
    {
        $featureAssembler = new FeatureAssembler();
        $response = $this->cyberkonsultant->post('/shop/features', [
            'json' => array_map(static function($feature) use ($featureAssembler) {
                return $featureAssembler->readDTO($feature);
            }, $features)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }
}