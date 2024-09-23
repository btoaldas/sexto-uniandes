<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/featurestore_online_service.proto

namespace Google\Cloud\AIPlatform\V1\ReadFeatureValuesResponse;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response header with metadata for the requested
 * [ReadFeatureValuesRequest.entity_type][google.cloud.aiplatform.v1.ReadFeatureValuesRequest.entity_type]
 * and Features.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.ReadFeatureValuesResponse.Header</code>
 */
class Header extends \Google\Protobuf\Internal\Message
{
    /**
     * The resource name of the EntityType from the
     * [ReadFeatureValuesRequest][google.cloud.aiplatform.v1.ReadFeatureValuesRequest].
     * Value format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entityType}`.
     *
     * Generated from protobuf field <code>string entity_type = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $entity_type = '';
    /**
     * List of Feature metadata corresponding to each piece of
     * [ReadFeatureValuesResponse.EntityView.data][google.cloud.aiplatform.v1.ReadFeatureValuesResponse.EntityView.data].
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.ReadFeatureValuesResponse.FeatureDescriptor feature_descriptors = 2;</code>
     */
    private $feature_descriptors;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $entity_type
     *           The resource name of the EntityType from the
     *           [ReadFeatureValuesRequest][google.cloud.aiplatform.v1.ReadFeatureValuesRequest].
     *           Value format:
     *           `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entityType}`.
     *     @type array<\Google\Cloud\AIPlatform\V1\ReadFeatureValuesResponse\FeatureDescriptor>|\Google\Protobuf\Internal\RepeatedField $feature_descriptors
     *           List of Feature metadata corresponding to each piece of
     *           [ReadFeatureValuesResponse.EntityView.data][google.cloud.aiplatform.v1.ReadFeatureValuesResponse.EntityView.data].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\FeaturestoreOnlineService::initOnce();
        parent::__construct($data);
    }

    /**
     * The resource name of the EntityType from the
     * [ReadFeatureValuesRequest][google.cloud.aiplatform.v1.ReadFeatureValuesRequest].
     * Value format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entityType}`.
     *
     * Generated from protobuf field <code>string entity_type = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getEntityType()
    {
        return $this->entity_type;
    }

    /**
     * The resource name of the EntityType from the
     * [ReadFeatureValuesRequest][google.cloud.aiplatform.v1.ReadFeatureValuesRequest].
     * Value format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entityType}`.
     *
     * Generated from protobuf field <code>string entity_type = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setEntityType($var)
    {
        GPBUtil::checkString($var, True);
        $this->entity_type = $var;

        return $this;
    }

    /**
     * List of Feature metadata corresponding to each piece of
     * [ReadFeatureValuesResponse.EntityView.data][google.cloud.aiplatform.v1.ReadFeatureValuesResponse.EntityView.data].
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.ReadFeatureValuesResponse.FeatureDescriptor feature_descriptors = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFeatureDescriptors()
    {
        return $this->feature_descriptors;
    }

    /**
     * List of Feature metadata corresponding to each piece of
     * [ReadFeatureValuesResponse.EntityView.data][google.cloud.aiplatform.v1.ReadFeatureValuesResponse.EntityView.data].
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.ReadFeatureValuesResponse.FeatureDescriptor feature_descriptors = 2;</code>
     * @param array<\Google\Cloud\AIPlatform\V1\ReadFeatureValuesResponse\FeatureDescriptor>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFeatureDescriptors($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\ReadFeatureValuesResponse\FeatureDescriptor::class);
        $this->feature_descriptors = $arr;

        return $this;
    }

}


