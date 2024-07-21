<?php
session_start();
include '..\Model\Customer_class.php';
//$_SESSION['usrn']= $username;
$conn=mysqli_connect("127.0.0.1","root","","project");

if($_SERVER["REQUEST_METHOD"] == "POST" )
 {
    $current_datetime = date('Y-m-d H:i:s');
    $cust = new Customer();
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $_SESSION['usrn']= $username;
    if( $username==="Admin" && $password==="123")
    {
        $txt="$username Successfully logged in at  $current_datetime.\n";
        $cust->writetoFile($txt);
        header("Location:../View/Admin.php");
        
    }
else{
    $qry="select * from account where Username='$username' and Password='$password';" ;
    $result=mysqli_query($conn,$qry);
    if(mysqli_num_rows($result)>0)
    {
        
        $row=mysqli_fetch_array($result);
        if($row['Status']=='A')
        {
        $txt="$username Successfully logged in at  $current_datetime.\n";
        $cust->writetoFile($txt);
            ?>
            <script>
                alert('Welcome '+'<?php echo $username ?>' );
                window.location.href = '../View/Customer_page.php?Cnm=<?php echo substr($username,-3); ?>'; 
            </script>
            <?php

        }
        else{
        $txt="$username un-successfully logged in at  $current_datetime due to Deactivated Account.\n";
        $cust->writetoFile($txt);
            
            ?>
           <script>alert("Your Account is Deactivated. Please contact 999");
           window.location.href = '../View/index.php'; 
        </script>
           <?php 

        }
        
    }
    else{
        $txt="$username un-successfully logged in at  $current_datetime due to Wrong Credentials.\n";
        $cust->writetoFile($txt);
        ?><script>
            alert('Wrong Credentials');
            window.location.href = '../View/index.php'; 
        </script>
        <?php
    }
}
 }
?>