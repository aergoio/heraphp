<?php

require 'aergo.php';


$aergo = new Aergo('testnet-api.aergo.io:7845');


// --- Query Smart Contract ---

echo("-- query smart contract --" . PHP_EOL);

$ret = $aergo->QuerySmartContract(
        'AmgLnRaGFLyvCPCEMHYJHooufT1c1pENTRGeV78WNPTxwQ2RYUW7',
        'hello');

if ($ret['success']) {
  echo('Result: ' . $ret['result'] . PHP_EOL);
} else {
  echo('Error ' . $ret['code'] . ': ' . $ret['desc'] . PHP_EOL);
}


// --- Get Account State ---

echo(PHP_EOL);
echo("-- account state --" . PHP_EOL);

$account = new Account();
$account->privkey = "DB85DD0CBA4732A11AEB3C7C4891FBD2FEC45FC72DB33FB61F31EB57E7246176";

$result = $aergo->GetAccountState($account);

if ($result === true) {
  print("address: " . $account->address . PHP_EOL);
  print("nonce: " . $account->nonce . PHP_EOL);
  print("balance: " . $account->balance . PHP_EOL);
} else {
  print("FAILED getting the account state: " . $result . PHP_EOL);
}


// --- Call Smart Contract ---

echo(PHP_EOL);
echo("-- call smart contract --" . PHP_EOL);

$receipt = $aergo->CallSmartContract(
            $account,
            'AmgLnRaGFLyvCPCEMHYJHooufT1c1pENTRGeV78WNPTxwQ2RYUW7',
            'set_name',
            "PHP!");

if ($receipt->status == "SUCCESS") {
  echo('Call succeeded! Recorded on block ' . $receipt->blockNo . PHP_EOL);
  echo('  with transaction hash ' . $receipt->txHash . PHP_EOL);
  echo('  used fee: ' . $receipt->feeUsed . PHP_EOL);
  if (strlen($receipt->ret) > 0) {
    echo('Return value: ' . $receipt->ret . PHP_EOL);
  }
} else {
  echo('Call failed: ' . $receipt->ret . PHP_EOL);
}


// --- Transfer ---

echo(PHP_EOL);
echo("-- transfer --" . PHP_EOL);

$receipt = $aergo->Transfer(
            $account,
            'AmQFpC4idVstgqhnn7ihyueadTBVBq55LzDLbK8XbzHuhMxKAQ72',
            0.123);

if ($receipt->status == "SUCCESS") {
  echo('Call succeeded! Recorded on block ' . $receipt->blockNo . PHP_EOL);
  echo('  with transaction hash ' . $receipt->txHash . PHP_EOL);
  echo('  used fee: ' . $receipt->feeUsed . PHP_EOL);
} else {
  echo('Call failed: ' . $receipt->ret . PHP_EOL);
}


?>
