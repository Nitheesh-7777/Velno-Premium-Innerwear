<?php
require('config.php');

$amount = $_POST['amount'] * 100; // in paise

$data = [
  'amount' => $amount,
  'currency' => 'INR',
  'receipt' => 'VELNO_' . time()
];

$ch = curl_init('https://api.razorpay.com/v1/orders');
curl_setopt($ch, CURLOPT_USERPWD, RAZORPAY_KEY . ":" . RAZORPAY_SECRET);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
echo $response;
