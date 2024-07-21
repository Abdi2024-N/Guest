<?php
$usrnm= $_REQUEST['usr'];
$conn= mysqli_connect("localhost","root","","project");
$qry1="Select * from account where UserName= '$usrnm';";
$res1 = mysqli_query($conn,$qry1);
$row=mysqli_fetch_array($res1);
if($row['Status']==='A')
{
$qry2="update account set Status='I' where UserName= '$usrnm';";
$res2 = mysqli_query($conn,$qry2);
}
else{
    $qry2="update account set Status='A' where UserName= '$usrnm';";
    $res2 = mysqli_query($conn,$qry2);
}
if($res2)
{
    header("Location:..\View\AccountTbl.php");
}
?>