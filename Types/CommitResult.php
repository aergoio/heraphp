<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.CommitResult</code>
 */
class CommitResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bytes hash = 1;</code>
     */
    private $hash = '';
    /**
     * Generated from protobuf field <code>.types.CommitStatus error = 2;</code>
     */
    private $error = 0;
    /**
     * Generated from protobuf field <code>string detail = 3;</code>
     */
    private $detail = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $hash
     *     @type int $error
     *     @type string $detail
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bytes hash = 1;</code>
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Generated from protobuf field <code>bytes hash = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->hash = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.types.CommitStatus error = 2;</code>
     * @return int
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Generated from protobuf field <code>.types.CommitStatus error = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkEnum($var, \Types\CommitStatus::class);
        $this->error = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string detail = 3;</code>
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Generated from protobuf field <code>string detail = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDetail($var)
    {
        GPBUtil::checkString($var, True);
        $this->detail = $var;

        return $this;
    }

}
