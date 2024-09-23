<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/deployment_resource_pool.proto

namespace GPBMetadata\Google\Cloud\Aiplatform\V1;

class DeploymentResourcePool
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Aiplatform\V1\EncryptionSpec::initOnce();
        \GPBMetadata\Google\Cloud\Aiplatform\V1\MachineResources::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
9google/cloud/aiplatform/v1/deployment_resource_pool.protogoogle.cloud.aiplatform.v1google/api/resource.proto0google/cloud/aiplatform/v1/encryption_spec.proto2google/cloud/aiplatform/v1/machine_resources.protogoogle/protobuf/timestamp.proto"�
DeploymentResourcePool
name (	B�AP
dedicated_resources (2..google.cloud.aiplatform.v1.DedicatedResourcesB�AC
encryption_spec (2*.google.cloud.aiplatform.v1.EncryptionSpec
service_account (	!
disable_container_logging (4
create_time (2.google.protobuf.TimestampB�A
satisfies_pzs (B�A
satisfies_pzi	 (B�A:��A�
0aiplatform.googleapis.com/DeploymentResourcePoolZprojects/{project}/locations/{location}/deploymentResourcePools/{deployment_resource_pool}B�
com.google.cloud.aiplatform.v1BDeploymentResourcePoolProtoPZ>cloud.google.com/go/aiplatform/apiv1/aiplatformpb;aiplatformpb�Google.Cloud.AIPlatform.V1�Google\\Cloud\\AIPlatform\\V1�Google::Cloud::AIPlatform::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

