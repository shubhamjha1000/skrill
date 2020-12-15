<?php
/*
 CREATED BY: SHREYANSH KASHYAP
 CREATED ON: 15th DEC, 2020
 EMAIL: JHAJINAMASTE@GMAIL.COM
*/

define("SKRILL_SECRET_WORD", strtoupper(md5("yourSecretWordHere")));

// Transaction detail sent back by the Skrill server
$transactionPayEmail = $_POST['pay_to_email'];
$transactionPayFromEmail = $_POST['pay_from_email'];
$transactionMerchantId = $_POST['merchant_id'];
$transactionMbtxn_id = $_POST['mb_transaction_id'];
$transactionMbAmount = $_POST['mb_amount'];
$transactionMbCurrency = $_POST['mb_currency'];
$transactionStatus = $_POST['status'];
$transactionMd5sig = $_POST['md5sig'];
$txn_id = $_POST['transaction_id'];

// Original details submitted using the form sent back by the Skrill server that you may use for your database updation
$amount = $_POST['amount'];
$currency_code = $_POST['currency'];


// Concatenate for calculating hash
$md5signature = $transactionMerchantId . $txn_id . SKRILL_SECRET_WORD . $transactionMbAmount . $transactionMbCurrency . $transactionStatus;

if(strtoupper(md5($md5signature)) == $transactionMd5sig){
  if($transactionStatus == 2){
    // Transaction successful. You may now update the database.
  }else{
    // Transaction is unsuccessful. You may log the details.
  }
}else{
  // Verification Signature Mismatch!
}
?>
