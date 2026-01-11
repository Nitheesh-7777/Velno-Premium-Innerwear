<?php
require('config.php');

$attributes = [
  'razorpay_order_id' => $_POST['razorpay_order_id'],
  'razorpay_payment_id' => $_POST['razorpay_payment_id'],
  'razorpay_signature' => $_POST['razorpay_signature']
];

$generated_signature = hash_hmac(
  'sha256',
  $attributes['razorpay_order_id'] . "|" . $attributes['razorpay_payment_id'],
  RAZORPAY_SECRET
);

if ($generated_signature === $attributes['razorpay_signature']) {
  echo "Payment Verified";
  // Save order to DB
} else {
  echo "Payment Failed";
}
