<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/migratable_resource.proto

namespace Google\Cloud\AIPlatform\V1\MigratableResource;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents one Model in automl.googleapis.com.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.MigratableResource.AutomlModel</code>
 */
class AutomlModel extends \Google\Protobuf\Internal\Message
{
    /**
     * Full resource name of automl Model.
     * Format:
     * `projects/{project}/locations/{location}/models/{model}`.
     *
     * Generated from protobuf field <code>string model = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $model = '';
    /**
     * The Model's display name in automl.googleapis.com.
     *
     * Generated from protobuf field <code>string model_display_name = 3;</code>
     */
    protected $model_display_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $model
     *           Full resource name of automl Model.
     *           Format:
     *           `projects/{project}/locations/{location}/models/{model}`.
     *     @type string $model_display_name
     *           The Model's display name in automl.googleapis.com.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\MigratableResource::initOnce();
        parent::__construct($data);
    }

    /**
     * Full resource name of automl Model.
     * Format:
     * `projects/{project}/locations/{location}/models/{model}`.
     *
     * Generated from protobuf field <code>string model = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Full resource name of automl Model.
     * Format:
     * `projects/{project}/locations/{location}/models/{model}`.
     *
     * Generated from protobuf field <code>string model = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setModel($var)
    {
        GPBUtil::checkString($var, True);
        $this->model = $var;

        return $this;
    }

    /**
     * The Model's display name in automl.googleapis.com.
     *
     * Generated from protobuf field <code>string model_display_name = 3;</code>
     * @return string
     */
    public function getModelDisplayName()
    {
        return $this->model_display_name;
    }

    /**
     * The Model's display name in automl.googleapis.com.
     *
     * Generated from protobuf field <code>string model_display_name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setModelDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->model_display_name = $var;

        return $this;
    }

}


