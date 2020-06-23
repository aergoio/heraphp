<?php

require __DIR__ . '/vendor/autoload.php';

require 'GPBMetadata/Rpc.php';
require 'Types/AergoRPCServiceClient.php';
require 'Types/PBEmpty.php';
require 'Types/ChainStats.php';

require 'Types/BlockchainStatus.php';
require 'Types/ChainInfo.php';
require 'Types/ChainId.php';

require 'Types/Query.php';
require 'Types/SingleBytes.php';

require 'Types/State.php';

require 'Types/Receipt.php';

require 'Types/TxBody.php';
require 'Types/Tx.php';
require 'Types/TxList.php';
require 'Types/TxType.php';

require 'Types/CommitResultList.php';
require 'Types/CommitResult.php';


use Tuupola\Base58;

use Elliptic\EC;



class Account {
  public $privkey;
  public $pubkey;
  public $address;
  public $nonce;
  public $balance;
  public $storage_root;
  public $is_updated;
}

class Receipt {
  public $contractAddress;
  public $status;
  public $ret;
  public $blockNo;
  public $blockHash;
  public $txIndex;
  public $txHash;
  public $gasUsed;
  public $feeUsed;
  public $feeDelegation;
}



function encode_address($pubkey) {

  $base58check = new Base58([
    "characters" => Base58::BITCOIN,
    "check" => true,
    "version" => 0x42
  ]);

  try {
      $encoded = $base58check->encode($pubkey);
  } catch (RuntimeException $exception) {
      print $exception->getMessage();
  }

  return $encoded;
}

function decode_address($address) {

  $base58check = new Base58([
    "characters" => Base58::BITCOIN,
    "check" => true,
    "version" => 0x42
  ]);

  try {
      $decoded = $base58check->decode($address);
  } catch (RuntimeException $exception) {
      print $exception->getMessage();
  }

  return $decoded;
}

function encode_hash($hash) {

  $base58 = new Tuupola\Base58(["characters" => Base58::BITCOIN]);

  return $base58->encode($hash);

}

function decode_hash($hash) {

  $base58 = new Tuupola\Base58(["characters" => Base58::BITCOIN]);

  return $base58->decode($hash);

}

function bignum_to_str($value) {
  $value = "" . gmp_import($value);
  $len = strlen($value);
  if ($len < 19) {
    $value = str_repeat("0", 19-$len) . $value;
    $len = strlen($value);
  }
  $dec = substr($value, -18);
  $int = substr($value, 0, $len-18);
  return $int . "." . $dec;
}

function amount_to_bignum($amount) {
  $amount = "" . $amount;
  $parts = explode(".", $amount);
  $int = $parts[0];
  if (count($parts) == 2) {
    $dec = $parts[1];
  } else {
    $dec = '';
  }
  // fill the decimal with trailing zeros
  $dec .= str_repeat('0', 18-strlen($dec));
  // contatenate both parts and convert it
  $val = gmp_init($int . $dec, 10);
  return gmp_export($val, 1, GMP_MSW_FIRST | GMP_BIG_ENDIAN);
}

function calculate_tx_hash($txbody, $include_signature) {

  $ctx = hash_init('sha256');

  // 64 bits - little endian
  hash_update($ctx, pack('P', $txbody->getNonce()));

  hash_update($ctx, $txbody->getAccount());

  hash_update($ctx, $txbody->getRecipient());

  // it must be at least 1 byte in size!
  hash_update($ctx, $txbody->getAmount());

  $payload = $txbody->getPayload();
  if ($payload) {
    hash_update($ctx, $payload);
  }

  // 64 bits - little endian
  hash_update($ctx, pack('P', $txbody->getGasLimit()));

  // variable length big endian
  hash_update($ctx, $txbody->getGasPrice());

  // 32 bits - little endian
  hash_update($ctx, pack('V', $txbody->getType()));

  hash_update($ctx, $txbody->getChainIdHash());

  if ($include_signature) {
    hash_update($ctx, $txbody->getSign());
  }

  return hash_final($ctx, false);
}





class Aergo {

  private $client;
  private $chainIdHash = "";


  public function __construct($server) {

    $this->client = new Types\AergoRPCServiceClient($server, [
      'credentials' => Grpc\ChannelCredentials::createInsecure(),
    ]);

  }


  private function get_chain_id_hash() {

    $none = new Types\PBEmpty();

    list($result, $status) = $this->client->Blockchain($none)->wait();

    $this->chainIdHash = $result->getBestChainIdHash();

  }


  function QuerySmartContract($contractAddress, $function, ...$args) {

    $decoded = decode_address($contractAddress);
    $query_info = '{"Name":"' . $function . '","Args":' . json_encode($args) . '}';

    $query = new Types\Query();
    $query->setContractAddress($decoded);
    $query->setQueryinfo($query_info);

    list($result, $status) = $this->client->QueryContract($query)->wait();

    if ($status->code == 0) {
      return array('success' => true, 'result' => $result->getValue());
    } else {
      return array('success' => false, 'desc' => $status->details, 'code' => $status->code);
    }

  }


  function GetAccountState(&$account) {

    $ec = new EC('secp256k1');

    $priv = $ec->keyFromPrivate($account->privkey);
    $account->pubkey = hex2bin($priv->getPublic(true, "hex"));

    $account->address = encode_address($account->pubkey);

    $query = new Types\SingleBytes();
    $query->setValue($account->pubkey);

    list($account_state, $status) = $this->client->GetState($query)->wait();

    if ($status->code == 0) {
      $account->nonce = $account_state->getNonce();
      $account->balance = bignum_to_str($account_state->getBalance());
      $account->storage_root = $account_state->getStorageRoot();
      $account->is_updated = true;
      return true;
    } else {
      return 'error ' . $status->code . ': ' . $status->details;
    }

  }


  function GetReceipt($txn_hash) {

    if (strlen($txn_hash) == 44) {
      $txn_hash = decode_hash($txn_hash);
    }

    $query = new Types\SingleBytes();
    $query->setValue($txn_hash);

    list($result, $status) = $this->client->GetReceipt($query)->wait();

    $receipt = new Receipt;

    if ($status->code == 0) {
      $receipt->address = encode_address($result->getContractAddress());
      $receipt->status = $result->getStatus();
      $receipt->ret = $result->getRet();
      $receipt->blockNo = $result->getBlockNo();
      $receipt->blockHash = encode_hash($result->getBlockHash());
      $receipt->txIndex = $result->getTxIndex();
      $receipt->txHash = encode_hash($result->getTxHash());
      $receipt->gasUsed = $result->getGasUsed();
      $receipt->feeUsed = bignum_to_str($result->getFeeUsed());
      $receipt->feeDelegation = $result->getFeeDelegation();
    } else {
      $receipt->status = "FAILED";
      $receipt->ret = "Error " . $status->code . ": " . $status->details;
    }

    return $receipt;
  }


  function SendTransaction(&$account, $type, $recipient, $amount, $payload) {

    if ($account->is_updated == false) {
      $result = $this->GetAccountState($account);
      if ($result !== true) {
        $receipt = new Receipt;
        $receipt->status = "FAILED";
        $receipt->ret = $result;
        return $receipt;
      }
    }

    if ($this->chainIdHash == '') {
      $this->get_chain_id_hash();
      if ($this->chainIdHash == '') {
        $receipt = new Receipt;
        $receipt->status = "FAILED";
        $receipt->ret = "Cannot retrieve the chain id hash";
        return $receipt;
      }
    }

    /* increment the account nonce */
    $account->nonce++;

    $txbody = new Types\TxBody();
    $tx     = new Types\Tx();
    $txlist = new Types\TxList();

    $txbody->setType($type);

    $txbody->setAccount($account->pubkey);
    $txbody->setNonce($account->nonce);

    $txbody->setAmount(amount_to_bignum($amount));

    $txbody->setRecipient(decode_address($recipient));
    $txbody->setPayload($payload);

    $txbody->setGasLimit(0);
    $txbody->setGasPrice(gmp_export(gmp_init(0), GMP_BIG_ENDIAN));
    $txbody->setChainIdHash($this->chainIdHash);

    // calculate the transaction hash

    $txhash = calculate_tx_hash($txbody, false);

    // sign the hash

    $ec = new EC('secp256k1');
    $priv = $ec->keyFromPrivate($account->privkey);
    $signature = $priv->sign($txhash);
    $sig = $signature->toDER('hex');

    $txbody->setSign(hex2bin($sig));

    // build the transaction

    $txhash = calculate_tx_hash($txbody, true);
    $tx->setHash(hex2bin($txhash));
    $tx->setBody($txbody);

    $txlist->setTxs([$tx]);

    // send the transaction

    list($results, $status) = $this->client->CommitTX($txlist)->wait();

    if ($status->code == 0) {
      $result = $results->getResults()[0];
      if ($result->getError() == 0) {
        do {
          $receipt = $this->GetReceipt($result->getHash());
        } while ($receipt->status == "FAILED" && strpos($receipt->ret, "tx not found") > 0);
      } else {
        $receipt = new Receipt;
        $receipt->status = "FAILED";
        $receipt->ret = "Error " . $result->getError() . ": " . $result->getDetail();
      }
    } else {
      $receipt = new Receipt;
      $receipt->status = "FAILED";
      $receipt->ret = "Error " . $status->code . ": " . $status->details;
    }

    return $receipt;
  }


  function CallSmartContract(&$account, $contractAddress, $function, ...$args) {

    $payload = '{"Name":"' . $function . '","Args":' . json_encode($args) . '}';

    return $this->SendTransaction(
      $account,
      Types\TxType::CALL,
      $contractAddress,
      0,
      $payload);

  }


  function Transfer(&$account, $to_account, $amount) {

    return $this->SendTransaction(
      $account,
      Types\TxType::TRANSFER,
      $to_account,
      $amount,
      '');

  }

}

?>
