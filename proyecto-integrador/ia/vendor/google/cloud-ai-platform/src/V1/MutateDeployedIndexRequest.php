<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/index_endpoint_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [IndexEndpointService.MutateDeployedIndex][google.cloud.aiplatform.v1.IndexEndpointService.MutateDeployedIndex].
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.MutateDeployedIndexRequest</code>
 */
class MutateDeployedIndexRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the IndexEndpoint resource into which to deploy an
     * Index. Format:
     * `projects/{project}/locations/{location}/indexEndpoints/{index_endpoint}`
     *
     * Generated from protobuf field <code>string index_endpoint = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $index_endpoint = '';
    /**
     * Required. The DeployedIndex to be updated within the IndexEndpoint.
     * Currently, the updatable fields are [DeployedIndex][automatic_resources]
     * and [DeployedIndex][dedicated_resources]
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.DeployedIndex deployed_index = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $deployed_index = null;

    /**
     * @param string                                    $indexEndpoint Required. The name of the IndexEndpoint resource into which to deploy an
     *                                                                 Index. Format:
     *                                                                 `projects/{project}/locations/{location}/indexEndpoints/{index_endpoint}`
     *                                                                 Please see {@see IndexEndpointServiceClient::indexEndpointName()} for help formatting this field.
     * @param \Google\Cloud\AIPlatform\V1\DeployedIndex $deployedIndex Required. The DeployedIndex to be updated within the IndexEndpoint.
     *                                                                 Currently, the updatable fields are [DeployedIndex][automatic_resources]
     *                                                                 and [DeployedIndex][dedicated_resources]
     *
     * @return \Google\Cloud\AIPlatform\V1\MutateDeployedIndexRequest
     *
     * @experimental
     */
    public static function build(string $indexEndpoint, \Google\Cloud\AIPlatform\V1\DeployedIndex $deployedIndex): self
    {
        return (new self())
            ->setIndexEndpoint($indexEndpoint)
            ->setDeployedIndex($deployedIndex);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $index_endpoint
     *           Required. The name of the IndexEndpoint resource into which to deploy an
     *           Index. Format:
     *           `projects/{project}/locations/{location}/indexEndpoints/{index_endpoint}`
     *     @type \Google\Cloud\AIPlatform\V1\DeployedIndex $deployed_index
     *           Required. The DeployedIndex to be updated within the IndexEndpoint.
     *           Currently, the updatable fields are [DeployedIndex][automatic_resources]
     *           and [DeployedIndex][dedicated_resources]
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\IndexEndpointService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the IndexEndpoint resource into which to deploy an
     * Index. Format:
     * `projects/{project}/locations/{location}/indexEndpoints/{index_endpoint}`
     *
     * Generated from protobuf field <code>string index_endpoint = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getIndexEndpoint()
    {
        return $this->index_endpoint;
    }

    /**
     * Required. The name of the IndexEndpoint resource into which to deploy an
     * Index. Format:
     * `projects/{project}/locations/{location}/indexEndpoints/{index_endpoint}`
     *
     * Generated from protobuf field <code>string index_endpoint = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setIndexEndpoint($var)
    {
        GPBUtil::checkString($var, True);
        $this->index_endpoint = $var;

        return $this;
    }

    /**
     * Required. The DeployedIndex to be updated within the IndexEndpoint.
     * Currently, the updatable fields are [DeployedIndex][automatic_resources]
     * and [DeployedIndex][dedicated_resources]
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.DeployedIndex deployed_index = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\AIPlatform\V1\DeployedIndex|null
     */
    public function getDeployedIndex()
    {
        return $this->deployed_index;
    }

    public function hasDeployedIndex()
    {
        return isset($this->deployed_index);
    }

    public function clearDeployedIndex()
    {
        unset($this->deployed_index);
    }

    /**
     * Required. The DeployedIndex to be updated within the IndexEndpoint.
     * Currently, the updatable fields are [DeployedIndex][automatic_resources]
     * and [DeployedIndex][dedicated_resources]
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.DeployedIndex deployed_index = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\AIPlatform\V1\DeployedIndex $var
     * @return $this
     */
    public function setDeployedIndex($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\DeployedIndex::class);
        $this->deployed_index = $var;

        return $this;
    }

}

