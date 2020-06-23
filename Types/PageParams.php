<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.PageParams</code>
 */
class PageParams extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 offset = 1;</code>
     */
    private $offset = 0;
    /**
     * Generated from protobuf field <code>uint32 size = 2;</code>
     */
    private $size = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $offset
     *     @type int $size
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 offset = 1;</code>
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Generated from protobuf field <code>uint32 offset = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkUint32($var);
        $this->offset = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 size = 2;</code>
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Generated from protobuf field <code>uint32 size = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setSize($var)
    {
        GPBUtil::checkUint32($var);
        $this->size = $var;

        return $this;
    }

}
