
<!-- Fetching sender's and beneficiary's a/c no and amount to be transferred from transfer form -->

<?php 
include "conn.php";
(int)$sender=($_POST["s"]);
(int)$bene=($_POST["b"]);
(int)$amt=($_POST["amt"]);

if(isset($sender)&&isset($bene)&&isset($amt)){
    $sql="SELECT Account_No,Current_Balance from customers where Account_No=$sender and Current_Balance>$amt"; 
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $sql="SELECT Account_No from customers where Account_No=$bene"; 
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                // Performing addition or subtraction in the balance in database

                $tran="UPDATE customers set Current_Balance=Current_Balance+$amt where Account_No=$bene";
                $result1=mysqli_query($conn,$tran);
                $tran1="UPDATE customers set Current_Balance=Current_Balance-$amt where Account_No=$sender";
                $result2=mysqli_query($conn,$tran1);
                if($result1){
                    if($result2){
                        $sql = "INSERT into transfers (f, t, amt, status) values ($sender, $bene, $amt, 'Success')";
                        $result=mysqli_query($conn,$sql);
                        header("Location:Customers.php?success=success");
                    }
                    else{
                        $sql = "INSERT into transfers (f, t, amt, status) values ($sender, $bene, $amt, 'Failed')";
                        $result=mysqli_query($conn,$sql);
                        header("Location:Customers.php?error=Invalid account or insufficent funds");
                    }   
                }
                else{
                    $sql = "INSERT into transfers (f, t, amt, status) values ($sender, $bene, $amt, 'Failed')";
                    $result=mysqli_query($conn,$sql);
                    header("Location:Customers.php?error=Invalid account or insufficent funds");
                } 
            }
        }
        else{
            $sql = "INSERT into transfers (f, t, amt, status) values ($sender, $bene, $amt, 'Failed')";
            $result=mysqli_query($conn,$sql);
            header("Location:Customers.php?error=Invalid account or insufficent funds");
        }
    }
    
    else{
        $sql = "INSERT into transfers (f, t, amt, status) values ($sender, $bene, $amt, 'Failed')";
        $result=mysqli_query($conn,$sql);
        header("Location:Customers.php?error=Invalid account or insufficent funds"); 
    }

}
