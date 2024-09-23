<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/feature_view.proto

namespace Google\Cloud\AIPlatform\V1\FeatureView;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for Sync. Only one option is set.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.FeatureView.SyncConfig</code>
 */
class SyncConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Cron schedule (https://en.wikipedia.org/wiki/Cron) to launch scheduled
     * runs. To explicitly set a timezone to the cron tab, apply a prefix in
     * the cron tab: "CRON_TZ=${IANA_TIME_ZONE}" or "TZ=${IANA_TIME_ZONE}".
     * The ${IANA_TIME_ZONE} may only be a valid string from IANA time zone
     * database. For example, "CRON_TZ=America/New_York 1 * * * *", or
     * "TZ=America/New_York 1 * * * *".
     *
     * Generated from protobuf field <code>string cron = 1;</code>
     */
    protected $cron = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $cron
     *           Cron schedule (https://en.wikipedia.org/wiki/Cron) to launch scheduled
     *           runs. To explicitly set a timezone to the cron tab, apply a prefix in
     *           the cron tab: "CRON_TZ=${IANA_TIME_ZONE}" or "TZ=${IANA_TIME_ZONE}".
     *           The ${IANA_TIME_ZONE} may only be a valid string from IANA time zone
     *           database. For example, "CRON_TZ=America/New_York 1 * * * *", or
     *           "TZ=America/New_York 1 * * * *".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\FeatureView::initOnce();
        parent::__construct($data);
    }

    /**
     * Cron schedule (https://en.wikipedia.org/wiki/Cron) to launch scheduled
     * runs. To explicitly set a timezone to the cron tab, apply a prefix in
     * the cron tab: "CRON_TZ=${IANA_TIME_ZONE}" or "TZ=${IANA_TIME_ZONE}".
     * The ${IANA_TIME_ZONE} may only be a valid string from IANA time zone
     * database. For example, "CRON_TZ=America/New_York 1 * * * *", or
     * "TZ=America/New_York 1 * * * *".
     *
     * Generated from protobuf field <code>string cron = 1;</code>
     * @return string
     */
    public function getCron()
    {
        return $this->cron;
    }

    /**
     * Cron schedule (https://en.wikipedia.org/wiki/Cron) to launch scheduled
     * runs. To explicitly set a timezone to the cron tab, apply a prefix in
     * the cron tab: "CRON_TZ=${IANA_TIME_ZONE}" or "TZ=${IANA_TIME_ZONE}".
     * The ${IANA_TIME_ZONE} may only be a valid string from IANA time zone
     * database. For example, "CRON_TZ=America/New_York 1 * * * *", or
     * "TZ=America/New_York 1 * * * *".
     *
     * Generated from protobuf field <code>string cron = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCron($var)
    {
        GPBUtil::checkString($var, True);
        $this->cron = $var;

        return $this;
    }

}


