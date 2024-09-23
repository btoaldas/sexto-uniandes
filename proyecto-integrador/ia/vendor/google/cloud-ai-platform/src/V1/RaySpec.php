<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/persistent_resource.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration information for the Ray cluster.
 * For experimental launch, Ray cluster creation and Persistent
 * cluster creation are 1:1 mapping: We will provision all the nodes within the
 * Persistent cluster as Ray nodes.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.RaySpec</code>
 */
class RaySpec extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Default image for user to choose a preferred ML framework
     * (for example, TensorFlow or Pytorch) by choosing from [Vertex prebuilt
     * images](https://cloud.google.com/vertex-ai/docs/training/pre-built-containers).
     * Either this or the resource_pool_images is required. Use this field if
     * you need all the resource pools to have the same Ray image. Otherwise, use
     * the {&#64;code resource_pool_images} field.
     *
     * Generated from protobuf field <code>string image_uri = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $image_uri = '';
    /**
     * Optional. Required if image_uri isn't set. A map of resource_pool_id to
     * prebuild Ray image if user need to use different images for different
     * head/worker pools. This map needs to cover all the resource pool ids.
     * Example:
     * {
     *   "ray_head_node_pool": "head image"
     *   "ray_worker_node_pool1": "worker image"
     *   "ray_worker_node_pool2": "another worker image"
     * }
     *
     * Generated from protobuf field <code>map<string, string> resource_pool_images = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $resource_pool_images;
    /**
     * Optional. This will be used to indicate which resource pool will serve as
     * the Ray head node(the first node within that pool). Will use the machine
     * from the first workerpool as the head node by default if this field isn't
     * set.
     *
     * Generated from protobuf field <code>string head_node_resource_pool_id = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $head_node_resource_pool_id = '';
    /**
     * Optional. Ray metrics configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayMetricSpec ray_metric_spec = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $ray_metric_spec = null;
    /**
     * Optional. OSS Ray logging configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayLogsSpec ray_logs_spec = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $ray_logs_spec = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $image_uri
     *           Optional. Default image for user to choose a preferred ML framework
     *           (for example, TensorFlow or Pytorch) by choosing from [Vertex prebuilt
     *           images](https://cloud.google.com/vertex-ai/docs/training/pre-built-containers).
     *           Either this or the resource_pool_images is required. Use this field if
     *           you need all the resource pools to have the same Ray image. Otherwise, use
     *           the {&#64;code resource_pool_images} field.
     *     @type array|\Google\Protobuf\Internal\MapField $resource_pool_images
     *           Optional. Required if image_uri isn't set. A map of resource_pool_id to
     *           prebuild Ray image if user need to use different images for different
     *           head/worker pools. This map needs to cover all the resource pool ids.
     *           Example:
     *           {
     *             "ray_head_node_pool": "head image"
     *             "ray_worker_node_pool1": "worker image"
     *             "ray_worker_node_pool2": "another worker image"
     *           }
     *     @type string $head_node_resource_pool_id
     *           Optional. This will be used to indicate which resource pool will serve as
     *           the Ray head node(the first node within that pool). Will use the machine
     *           from the first workerpool as the head node by default if this field isn't
     *           set.
     *     @type \Google\Cloud\AIPlatform\V1\RayMetricSpec $ray_metric_spec
     *           Optional. Ray metrics configurations.
     *     @type \Google\Cloud\AIPlatform\V1\RayLogsSpec $ray_logs_spec
     *           Optional. OSS Ray logging configurations.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\PersistentResource::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. Default image for user to choose a preferred ML framework
     * (for example, TensorFlow or Pytorch) by choosing from [Vertex prebuilt
     * images](https://cloud.google.com/vertex-ai/docs/training/pre-built-containers).
     * Either this or the resource_pool_images is required. Use this field if
     * you need all the resource pools to have the same Ray image. Otherwise, use
     * the {&#64;code resource_pool_images} field.
     *
     * Generated from protobuf field <code>string image_uri = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getImageUri()
    {
        return $this->image_uri;
    }

    /**
     * Optional. Default image for user to choose a preferred ML framework
     * (for example, TensorFlow or Pytorch) by choosing from [Vertex prebuilt
     * images](https://cloud.google.com/vertex-ai/docs/training/pre-built-containers).
     * Either this or the resource_pool_images is required. Use this field if
     * you need all the resource pools to have the same Ray image. Otherwise, use
     * the {&#64;code resource_pool_images} field.
     *
     * Generated from protobuf field <code>string image_uri = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setImageUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_uri = $var;

        return $this;
    }

    /**
     * Optional. Required if image_uri isn't set. A map of resource_pool_id to
     * prebuild Ray image if user need to use different images for different
     * head/worker pools. This map needs to cover all the resource pool ids.
     * Example:
     * {
     *   "ray_head_node_pool": "head image"
     *   "ray_worker_node_pool1": "worker image"
     *   "ray_worker_node_pool2": "another worker image"
     * }
     *
     * Generated from protobuf field <code>map<string, string> resource_pool_images = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getResourcePoolImages()
    {
        return $this->resource_pool_images;
    }

    /**
     * Optional. Required if image_uri isn't set. A map of resource_pool_id to
     * prebuild Ray image if user need to use different images for different
     * head/worker pools. This map needs to cover all the resource pool ids.
     * Example:
     * {
     *   "ray_head_node_pool": "head image"
     *   "ray_worker_node_pool1": "worker image"
     *   "ray_worker_node_pool2": "another worker image"
     * }
     *
     * Generated from protobuf field <code>map<string, string> resource_pool_images = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setResourcePoolImages($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->resource_pool_images = $arr;

        return $this;
    }

    /**
     * Optional. This will be used to indicate which resource pool will serve as
     * the Ray head node(the first node within that pool). Will use the machine
     * from the first workerpool as the head node by default if this field isn't
     * set.
     *
     * Generated from protobuf field <code>string head_node_resource_pool_id = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getHeadNodeResourcePoolId()
    {
        return $this->head_node_resource_pool_id;
    }

    /**
     * Optional. This will be used to indicate which resource pool will serve as
     * the Ray head node(the first node within that pool). Will use the machine
     * from the first workerpool as the head node by default if this field isn't
     * set.
     *
     * Generated from protobuf field <code>string head_node_resource_pool_id = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setHeadNodeResourcePoolId($var)
    {
        GPBUtil::checkString($var, True);
        $this->head_node_resource_pool_id = $var;

        return $this;
    }

    /**
     * Optional. Ray metrics configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayMetricSpec ray_metric_spec = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\AIPlatform\V1\RayMetricSpec|null
     */
    public function getRayMetricSpec()
    {
        return $this->ray_metric_spec;
    }

    public function hasRayMetricSpec()
    {
        return isset($this->ray_metric_spec);
    }

    public function clearRayMetricSpec()
    {
        unset($this->ray_metric_spec);
    }

    /**
     * Optional. Ray metrics configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayMetricSpec ray_metric_spec = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\AIPlatform\V1\RayMetricSpec $var
     * @return $this
     */
    public function setRayMetricSpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\RayMetricSpec::class);
        $this->ray_metric_spec = $var;

        return $this;
    }

    /**
     * Optional. OSS Ray logging configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayLogsSpec ray_logs_spec = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\AIPlatform\V1\RayLogsSpec|null
     */
    public function getRayLogsSpec()
    {
        return $this->ray_logs_spec;
    }

    public function hasRayLogsSpec()
    {
        return isset($this->ray_logs_spec);
    }

    public function clearRayLogsSpec()
    {
        unset($this->ray_logs_spec);
    }

    /**
     * Optional. OSS Ray logging configurations.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.RayLogsSpec ray_logs_spec = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\AIPlatform\V1\RayLogsSpec $var
     * @return $this
     */
    public function setRayLogsSpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\RayLogsSpec::class);
        $this->ray_logs_spec = $var;

        return $this;
    }

}

