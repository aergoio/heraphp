<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.Output</code>
 */
class Output extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     */
    private $index = 0;
    /**
     * Generated from protobuf field <code>bytes address = 2;</code>
     */
    private $address = '';
    /**
     * Generated from protobuf field <code>bytes value = 3;</code>
     */
    private $value = '';
    /**
     * Generated from protobuf field <code>bytes script = 4;</code>
     */
    private $script = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $index
     *     @type string $address
     *     @type string $value
     *     @type string $script
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setIndex($var)
    {
        GPBUtil::checkUint32($var);
        $this->index = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes address = 2;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Generated from protobuf field <code>bytes address = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, False);
        $this->address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes value = 3;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Generated from protobuf field <code>bytes value = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, False);
        $this->value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes script = 4;</code>
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Generated from protobuf field <code>bytes script = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setScript($var)
    {
        GPBUtil::checkString($var, False);
        $this->script = $var;

        return $this;
    }

}
