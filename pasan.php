<?php
// Get Payhere Details
$merchant_id = $_POST['merchant_id'];
$order_id = $_POST['order_id'];
$payhere_amount = $_POST['payhere_amount'];
$payhere_currency = $_POST['payhere_currency'];
$status_code = $_POST['status_code'];
$payment_id = $_POST['payment_id'];
$status_message = $_POST['status_message'];

if ($status_code == 2) {
    // Payment OK    
}else{
    // Payment Error
}

?>
