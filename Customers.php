<?php
include 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View All Customers</title>
</head>
<body>

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


<!-- All Customers Entries -->

<div class="container" style="padding-top: 120px;">
  <p class="h1" style="font-family: PT Serif; color:#4242a1; text-align: center; padding: 15px; font-weight: bold; font-size: 50px;">All Customers</p>
      
<?php if (isset($_GET['success'])) { ?> 
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo "<strong>Transfer Success</strong>";?>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?> 
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo "<strong>Invalid Account or Insufficient Funds</strong>";?>
</div>
<?php } ?>

  <table class="table table-hover">
    <thead>
      <tr style="text-align: center;">
        <th style="padding: 15px;">Sr No.</th>
        <th style="padding: 15px;">Name</th>
        <th style="padding: 15px;">Account No.</th>
        <th style="padding: 15px;">Email</th>
        <th style="padding: 15px;">Current Balance</th>
        <th style="padding: 15px;">View Details</th>
      </tr>
    </thead>

    <tbody>

      <!-- Fetching entries from database -->

      <?php
      include "conn.php";
      $sql="select Sr_No, Name, Account_No, Email, Current_Balance from customers";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
      ?>

          <tr style="text-align: center;">
            <td style="padding: 15px;"><?php echo $row['Sr_No']; ?></td>
            <td style="padding: 15px;"><?php echo $row['Name']; ?></td>
            <td style="padding: 15px;"><?php echo $row['Account_No']; ?></td>
            <td style="padding: 15px;"><?php echo $row['Email']; ?></td>
            <td style="padding: 15px;">₹<?php echo $row['Current_Balance']; ?></td>
            <td><button type="button" class="btn btn-outline-warning"  data-toggle="modal" data-target="#myModal<?php echo $row['Sr_No']; ?>">View</button></td>
          </tr>
          

    <!-- Modal to show the customer details and transfer button -->      
  
    <div id="myModal<?php echo $row['Sr_No'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-body" style="padding-left: 40px;">
            
            <h3 style="text-align: center;">Customer Details</h3>
            <br><p>Name: <?php echo $row['Name'];?></p><hr>
            <p>Account No.: <?php echo $row['Account_No'];?></p><hr>
            <p>Email: <?php echo $row['Email'];?></p><hr>
            <p>Balance: <?php echo $row['Current_Balance'];?></p><br>
            <center><?php echo '<a href="Transfer.php?id='.$row['Sr_No'].'">'; ?><button class="btn btn-outline-info btn-lg">Transfer</button></a></center>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
    <?php
    }
  } else {
    echo "0 results";
  } ?>
       
    </tbody>
    
  </table>
</div>
      


</div>

<br><br>


</body>

<footer style="width: 100%; background-color:grey; color:white; padding: 10px; text-align: center; font-style: italic;">
  © 2022. Created by <b>Yukta Wagh</b> <br>As a part of TSF GRIP
</footer>

</html>
