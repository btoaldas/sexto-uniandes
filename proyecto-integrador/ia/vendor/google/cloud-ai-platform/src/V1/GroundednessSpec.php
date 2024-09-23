<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/evaluation_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Spec for groundedness metric.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.GroundednessSpec</code>
 */
class GroundednessSpec extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Which version to use for evaluation.
     *
     * Generated from protobuf field <code>int32 version = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $version = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $version
     *           Optional. Which version to use for evaluation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\EvaluationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. Which version to use for evaluation.
     *
     * Generated from protobuf field <code>int32 version = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Optional. Which version to use for evaluation.
     *
     * Generated from protobuf field <code>int32 version = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->version = $var;

        return $this;
    }

}

