<?php
include 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View All Transactions</title>
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
      <li class="nav-item">
        <a class="nav-link" href="Customers.php"><i class="fa fa-users"></i> View All Customers</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="transfers.php"><i class="fa fa-money"></i> All Transactions</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- Transactions Table -->

<div class="container" style="padding-top: 120px;">
  <p class="h1" style="font-family: PT Serif; color:#4242a1; text-align: center; padding: 15px; font-weight: bold; font-size: 50px;">All Transactions</p>
      

  <table class="table table-hover" >
    <thead>
      <tr style="text-align: center;">
        <th>Sr No.</th>
        <th>From</th>
        <th>To</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>
    </thead>

<!-- Fetching entries from database -->

    <tbody>
      <?php
      include "conn.php";
      $sql="select sr, f, t, amt, status from transfers";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
      ?>

          <tr style="text-align: center;">
            <td><?php echo $row['sr']; ?></td>
            <td><?php echo $row['f']; ?></td>
            <td><?php echo $row['t']; ?></td>
            <td>₹<?php echo $row['amt']; ?></td>
            <?php 
              if($row['status']==="Success"){ ?>
                <td style="color: green; font-weight: bold;"><?php echo $row['status']; ?></td>
              <?php }
              else { ?>
                <td style="color: red; font-weight: bold;"><?php echo $row['status']; ?></td>
              <?php } ?>


            <!-- <td><?php echo $row['status']; ?></td> -->
          </tr>
          
  

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

<footer style="background-color:grey; color:white; padding: 10px; text-align: center; font-style: italic;">
  © 2022. Created by <b>Yukta Wagh</b> <br>As a part of TSF GRIP
</footer>

</html>
