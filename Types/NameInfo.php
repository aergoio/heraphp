<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.NameInfo</code>
 */
class NameInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.types.Name name = 1;</code>
     */
    private $name = null;
    /**
     * Generated from protobuf field <code>bytes owner = 2;</code>
     */
    private $owner = '';
    /**
     * Generated from protobuf field <code>bytes destination = 3;</code>
     */
    private $destination = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Types\Name $name
     *     @type string $owner
     *     @type string $destination
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.types.Name name = 1;</code>
     * @return \Types\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>.types.Name name = 1;</code>
     * @param \Types\Name $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkMessage($var, \Types\Name::class);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes owner = 2;</code>
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Generated from protobuf field <code>bytes owner = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setOwner($var)
    {
        GPBUtil::checkString($var, False);
        $this->owner = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes destination = 3;</code>
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Generated from protobuf field <code>bytes destination = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDestination($var)
    {
        GPBUtil::checkString($var, False);
        $this->destination = $var;

        return $this;
    }

}

