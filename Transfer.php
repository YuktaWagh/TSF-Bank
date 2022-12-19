<?php
include 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer Funds</title>
</head>
<body>

<!-- Fetching account number for the respective customer's transfer -->

<?php 

include "conn.php";

$id = $_GET["id"];
$sql = "SELECT Account_No from customers where Sr_No=$id";
$result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { ?>

<!-- Navigation Bar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; width: 100%;">

  <a class="navbar-brand" style="font-weight: bold; border: 20px; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF; color: #0af3f7; font-family: PT Serif; font-size: 30px; border-color: green;" href="index.php"><img src="TSF Bank.png"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Customers.php"><i class="fa fa-users"></i> View All Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transfers.php"><i class="fa fa-money"></i> All Transactions</a>
      </li>
      
    </ul>
  </div>
</nav>


<div class="container" style="padding-top: 120px;">

      <!-- Transfer form -->
  
      <h3 style="margin: 20px; font-family: PT Serif; font-size: 45px; font-weight: bold; color: color:#4242a1;"><center>Transfer Funds</center>
      </h3>
      
      <center>
      <form class="shadow-lg col-md-9" style="margin-top: 10px; border-radius: 10px; border-style: solid; border-width: 1px; background-color: #ffe18f;" action="transferop.php" method="POST">
          <span style="padding: 10px;">
          

            <div class="form-floating col-md-6">
            <input readonly style="border-radius: 20px;" type="number" class="form-control" id="s" name="s" placeholder="Enter A/C No." required value=<?php echo $row["Account_No"]; }} ?>>
            <label style="padding-left: 30px;" for="s"></label>
            </div>
            
            <hr>

            <div class="form-floating col-md-6">
            <input style="border-radius: 20px;" type="number" class="form-control" id="b" name="b" placeholder="Enter A/C No." required>
            <label style="padding-left: 30px;" for="b"><span class="required" style="color: red">*</span>Beneficiary's A/C No.</label>
            </div><hr>

            
            <div class="form-floating col-md-6">
            <input style="border-radius: 20px;" type="number" class="form-control" id="amt" name="amt" placeholder="Enter A/C No." required>
            <label style="padding-left: 30px;" for="amt"><span class="required" style="color: red">*</span>Amount ₹</label>
            </div> <hr>

            <button type="submit" class="btn btn-success" style="border-radius: 15px; color: white; font-size: 25px; margin-bottom: 20px;">Transfer</button> 

          
        </span>
      </form>
      </center>

</div>

<br><br>


</body>

<footer style="background-color:grey; color:white; padding: 10px; text-align: center; font-style: italic;">
  © 2022. Created by <b>Yukta Wagh</b> <br>As a part of TSF GRIP
</footer>

</html>
