<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Types;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>types.BlockBody</code>
 */
class BlockBody extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .types.Tx txs = 1;</code>
     */
    private $txs;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Types\Tx[]|\Google\Protobuf\Internal\RepeatedField $txs
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .types.Tx txs = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTxs()
    {
        return $this->txs;
    }

    /**
     * Generated from protobuf field <code>repeated .types.Tx txs = 1;</code>
     * @param \Types\Tx[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTxs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Types\Tx::class);
        $this->txs = $arr;

        return $this;
    }

}

