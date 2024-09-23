<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/migration_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Runtime operation information for
 * [MigrationService.BatchMigrateResources][google.cloud.aiplatform.v1.MigrationService.BatchMigrateResources].
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.BatchMigrateResourcesOperationMetadata</code>
 */
class BatchMigrateResourcesOperationMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * The common part of the operation metadata.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.GenericOperationMetadata generic_metadata = 1;</code>
     */
    protected $generic_metadata = null;
    /**
     * Partial results that reflect the latest migration operation progress.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.BatchMigrateResourcesOperationMetadata.PartialResult partial_results = 2;</code>
     */
    private $partial_results;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AIPlatform\V1\GenericOperationMetadata $generic_metadata
     *           The common part of the operation metadata.
     *     @type array<\Google\Cloud\AIPlatform\V1\BatchMigrateResourcesOperationMetadata\PartialResult>|\Google\Protobuf\Internal\RepeatedField $partial_results
     *           Partial results that reflect the latest migration operation progress.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\MigrationService::initOnce();
        parent::__construct($data);
    }

    /**
     * The common part of the operation metadata.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.GenericOperationMetadata generic_metadata = 1;</code>
     * @return \Google\Cloud\AIPlatform\V1\GenericOperationMetadata|null
     */
    public function getGenericMetadata()
    {
        return $this->generic_metadata;
    }

    public function hasGenericMetadata()
    {
        return isset($this->generic_metadata);
    }

    public function clearGenericMetadata()
    {
        unset($this->generic_metadata);
    }

    /**
     * The common part of the operation metadata.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.GenericOperationMetadata generic_metadata = 1;</code>
     * @param \Google\Cloud\AIPlatform\V1\GenericOperationMetadata $var
     * @return $this
     */
    public function setGenericMetadata($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\GenericOperationMetadata::class);
        $this->generic_metadata = $var;

        return $this;
    }

    /**
     * Partial results that reflect the latest migration operation progress.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.BatchMigrateResourcesOperationMetadata.PartialResult partial_results = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPartialResults()
    {
        return $this->partial_results;
    }

    /**
     * Partial results that reflect the latest migration operation progress.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.BatchMigrateResourcesOperationMetadata.PartialResult partial_results = 2;</code>
     * @param array<\Google\Cloud\AIPlatform\V1\BatchMigrateResourcesOperationMetadata\PartialResult>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPartialResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\BatchMigrateResourcesOperationMetadata\PartialResult::class);
        $this->partial_results = $arr;

        return $this;
    }

}

