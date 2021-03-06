<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * info and bps is json string
 *
 * Generated from protobuf message <code>types.ConsensusInfo</code>
 */
class ConsensusInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string type = 1;</code>
     */
    private $type = '';
    /**
     * Generated from protobuf field <code>string info = 2;</code>
     */
    private $info = '';
    /**
     * Generated from protobuf field <code>repeated string bps = 3;</code>
     */
    private $bps;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $type
     *     @type string $info
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $bps
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string type = 1;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Generated from protobuf field <code>string type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string info = 2;</code>
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Generated from protobuf field <code>string info = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setInfo($var)
    {
        GPBUtil::checkString($var, True);
        $this->info = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string bps = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getBps()
    {
        return $this->bps;
    }

    /**
     * Generated from protobuf field <code>repeated string bps = 3;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setBps($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->bps = $arr;

        return $this;
    }

}

