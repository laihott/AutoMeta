<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/operations.proto

namespace Google\Cloud\Dataproc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The status of the operation.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1.ClusterOperationStatus</code>
 */
class ClusterOperationStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. A message containing the operation state.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus.State state = 1;</code>
     */
    private $state = 0;
    /**
     * Output only. A message containing the detailed operation state.
     *
     * Generated from protobuf field <code>string inner_state = 2;</code>
     */
    private $inner_state = '';
    /**
     * Output only. A message containing any operation metadata details.
     *
     * Generated from protobuf field <code>string details = 3;</code>
     */
    private $details = '';
    /**
     * Output only. The time this state was entered.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp state_start_time = 4;</code>
     */
    private $state_start_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $state
     *           Output only. A message containing the operation state.
     *     @type string $inner_state
     *           Output only. A message containing the detailed operation state.
     *     @type string $details
     *           Output only. A message containing any operation metadata details.
     *     @type \Google\Protobuf\Timestamp $state_start_time
     *           Output only. The time this state was entered.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1\Operations::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. A message containing the operation state.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus.State state = 1;</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. A message containing the operation state.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.ClusterOperationStatus.State state = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dataproc\V1\ClusterOperationStatus_State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. A message containing the detailed operation state.
     *
     * Generated from protobuf field <code>string inner_state = 2;</code>
     * @return string
     */
    public function getInnerState()
    {
        return $this->inner_state;
    }

    /**
     * Output only. A message containing the detailed operation state.
     *
     * Generated from protobuf field <code>string inner_state = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setInnerState($var)
    {
        GPBUtil::checkString($var, True);
        $this->inner_state = $var;

        return $this;
    }

    /**
     * Output only. A message containing any operation metadata details.
     *
     * Generated from protobuf field <code>string details = 3;</code>
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Output only. A message containing any operation metadata details.
     *
     * Generated from protobuf field <code>string details = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDetails($var)
    {
        GPBUtil::checkString($var, True);
        $this->details = $var;

        return $this;
    }

    /**
     * Output only. The time this state was entered.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp state_start_time = 4;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getStateStartTime()
    {
        return $this->state_start_time;
    }

    /**
     * Output only. The time this state was entered.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp state_start_time = 4;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStateStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->state_start_time = $var;

        return $this;
    }

}

