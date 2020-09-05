<?php session_start(); ob_start();
error_reporting(0);
include_once("config.php");
//Set variables for paypal form


?>
<!DOCTYPE html>
<html>
<head>
	<title>Pay via Mixed Card on Klickcom </title>
	<link rel="apple-touch-icon" sizes="76x76" href="./images/1.png">
    <link rel="icon" type="image/png" href="./images/2.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<div class="container">
	<div class="success-page">
<img src="https://www.payhere.lk/downloads/images/payhere_square_banner.png" alt="PayHere" width="180"/>

  <h2>Pay via Payhere on Klickcom.com</h2>
  <p><b>KLICKCOM SRI LANKA</b> | WWW.KLICKCOM.COM</p>

<table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      
                     
                      
                    
                    </tr>
                  </thead>
                
<tbody>
<?php
		$sql = "SELECT * FROM pending_orders where ref='".$_SESSION['favcolor']."' ";
		$resultset = mysqli_query($bd, $sql) or die("database error:". mysqli_error($bd));
		$row = mysqli_fetch_assoc($resultset);
		$rupee=$row['total'];
		 
		
		$sql1 = "SELECT * FROM users where id='".$row['userId']."' ";
		$resultset1 = mysqli_query($bd, $sql1) or die("database error:". mysqli_error($bd));
		$row1 = mysqli_fetch_assoc($resultset1);
		
		?>	
	<tr>
                      
                      <td>ORDER NUMBER</td>
                      <td><?php echo $row['ref']; ?></td>
                      
                      </tr>
                    
                  
                        <tr>
                      
                      <td>TOTAL IN LKR</td>
                      <td><?php  echo $rupee; ?></td>
                      
                      </tr>
                       <tr>
            
                          <td>CUSTOMER NAME</td>
                      <td><?php echo $row1['f_name']; ?> <?php echo $row1['l_name']; ?></td>
                      
                      </tr>
<tr>
            
                          <td>BILLING ADDRESS</td>
                      <td><?php echo $row1['billingAddress'];; ?></td>
                      
                      </tr>
                 <tr>
            
                          <td>EMAIL</td>
                      <td><?php echo $row1['email'];; ?></td>
                      
                      </tr>
                      <tr>
            
                          <td>CONTACT NO</td>
                      <td><?php echo $row1['contactno'];; ?></td>
                      
                      </tr>
                    </tbody>
                </table>



<form method="post" action="https://sandbox.payhere.lk/pay/checkout"> 

    <input type="hidden" name="merchant_id" value="1213414">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="https://klickcom.com/payhere/cardpay-status.php">
    <input type="hidden" name="cancel_url" value="https://klickcom.com/payhere/cardpay-cancel.php">
    <input type="hidden" name="notify_url" value="https://klickcom.com/payhere/verify.php">  
    
    <input type="hidden" name="order_id" value="<?php echo $row['ref']; ?>">
    <input type="hidden" name="items" value="INV-<?php echo $row['ref']; ?>"<br>
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value="<?php echo $row['total']; ?>">  
   
    <input type="hidden" name="first_name" value="<?php echo $row1['f_name']; ?>">
    <input type="hidden" name="last_name" value="<?php echo $row1['l_name']; ?>"><br>
    <input type="hidden" name="email" value="<?php echo $row1['email']; ?>">
    <input type="hidden" name="phone" value="<?php echo $row1['contactno']; ?>"><br>
    <input type="hidden" name="address" value="<?php echo $row1['billingAddress']; ?>">
    <input type="hidden" name="city" value="<?php echo $row1['billingCity']; ?>">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form> 
  
  <br>
<br>
</div>

</div>



</div>
<style type="text/css">
	
	.success-page{
  
  display:block;
  margin: 0 auto;
  text-align: center;
      position: relative;
    top: 5%;
    transform: perspective(1px) translateY(5%)
}
.success-page img{
  max-width:180px;
  display: block;
  margin: 0 auto;
}

.btn-view-orders{
  display: block;
  border:1px solid #47c7c5;
  width:100px;
  margin: 0 auto;
  margin-top: 45px;
  padding: 10px;
  color:#fff;
  background-color:#47c7c5;
  text-decoration: none;
  margin-bottom: 20px;
}
h2{
  color:#47c7c5;
    margin-top: 25px;

}
a{
  text-decoration: none;
}
</style>





</body>



</html>




