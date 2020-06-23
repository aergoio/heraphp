<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.ChainId</code>
 */
class ChainId extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string magic = 1;</code>
     */
    private $magic = '';
    /**
     * Generated from protobuf field <code>bool public = 2;</code>
     */
    private $public = false;
    /**
     * Generated from protobuf field <code>bool mainnet = 3;</code>
     */
    private $mainnet = false;
    /**
     * Generated from protobuf field <code>string consensus = 4;</code>
     */
    private $consensus = '';
    /**
     * Generated from protobuf field <code>int32 version = 5;</code>
     */
    private $version = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $magic
     *     @type bool $public
     *     @type bool $mainnet
     *     @type string $consensus
     *     @type int $version
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string magic = 1;</code>
     * @return string
     */
    public function getMagic()
    {
        return $this->magic;
    }

    /**
     * Generated from protobuf field <code>string magic = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMagic($var)
    {
        GPBUtil::checkString($var, True);
        $this->magic = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool public = 2;</code>
     * @return bool
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Generated from protobuf field <code>bool public = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setPublic($var)
    {
        GPBUtil::checkBool($var);
        $this->public = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool mainnet = 3;</code>
     * @return bool
     */
    public function getMainnet()
    {
        return $this->mainnet;
    }

    /**
     * Generated from protobuf field <code>bool mainnet = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setMainnet($var)
    {
        GPBUtil::checkBool($var);
        $this->mainnet = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string consensus = 4;</code>
     * @return string
     */
    public function getConsensus()
    {
        return $this->consensus;
    }

    /**
     * Generated from protobuf field <code>string consensus = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setConsensus($var)
    {
        GPBUtil::checkString($var, True);
        $this->consensus = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 version = 5;</code>
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Generated from protobuf field <code>int32 version = 5;</code>
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

