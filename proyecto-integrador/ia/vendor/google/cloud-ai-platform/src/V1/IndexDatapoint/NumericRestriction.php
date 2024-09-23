<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/index.proto

namespace Google\Cloud\AIPlatform\V1\IndexDatapoint;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * This field allows restricts to be based on numeric comparisons rather
 * than categorical tokens.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.IndexDatapoint.NumericRestriction</code>
 */
class NumericRestriction extends \Google\Protobuf\Internal\Message
{
    /**
     * The namespace of this restriction. e.g.: cost.
     *
     * Generated from protobuf field <code>string namespace = 1;</code>
     */
    protected $namespace = '';
    /**
     * This MUST be specified for queries and must NOT be specified for
     * datapoints.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.IndexDatapoint.NumericRestriction.Operator op = 5;</code>
     */
    protected $op = 0;
    protected $Value;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $value_int
     *           Represents 64 bit integer.
     *     @type float $value_float
     *           Represents 32 bit float.
     *     @type float $value_double
     *           Represents 64 bit float.
     *     @type string $namespace
     *           The namespace of this restriction. e.g.: cost.
     *     @type int $op
     *           This MUST be specified for queries and must NOT be specified for
     *           datapoints.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\Index::initOnce();
        parent::__construct($data);
    }

    /**
     * Represents 64 bit integer.
     *
     * Generated from protobuf field <code>int64 value_int = 2;</code>
     * @return int|string
     */
    public function getValueInt()
    {
        return $this->readOneof(2);
    }

    public function hasValueInt()
    {
        return $this->hasOneof(2);
    }

    /**
     * Represents 64 bit integer.
     *
     * Generated from protobuf field <code>int64 value_int = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setValueInt($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Represents 32 bit float.
     *
     * Generated from protobuf field <code>float value_float = 3;</code>
     * @return float
     */
    public function getValueFloat()
    {
        return $this->readOneof(3);
    }

    public function hasValueFloat()
    {
        return $this->hasOneof(3);
    }

    /**
     * Represents 32 bit float.
     *
     * Generated from protobuf field <code>float value_float = 3;</code>
     * @param float $var
     * @return $this
     */
    public function setValueFloat($var)
    {
        GPBUtil::checkFloat($var);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Represents 64 bit float.
     *
     * Generated from protobuf field <code>double value_double = 4;</code>
     * @return float
     */
    public function getValueDouble()
    {
        return $this->readOneof(4);
    }

    public function hasValueDouble()
    {
        return $this->hasOneof(4);
    }

    /**
     * Represents 64 bit float.
     *
     * Generated from protobuf field <code>double value_double = 4;</code>
     * @param float $var
     * @return $this
     */
    public function setValueDouble($var)
    {
        GPBUtil::checkDouble($var);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * The namespace of this restriction. e.g.: cost.
     *
     * Generated from protobuf field <code>string namespace = 1;</code>
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * The namespace of this restriction. e.g.: cost.
     *
     * Generated from protobuf field <code>string namespace = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setNamespace($var)
    {
        GPBUtil::checkString($var, True);
        $this->namespace = $var;

        return $this;
    }

    /**
     * This MUST be specified for queries and must NOT be specified for
     * datapoints.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.IndexDatapoint.NumericRestriction.Operator op = 5;</code>
     * @return int
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * This MUST be specified for queries and must NOT be specified for
     * datapoints.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.IndexDatapoint.NumericRestriction.Operator op = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setOp($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AIPlatform\V1\IndexDatapoint\NumericRestriction\Operator::class);
        $this->op = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->whichOneof("Value");
    }

}


