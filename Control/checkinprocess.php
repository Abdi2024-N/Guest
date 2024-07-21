<?php
include '..\Model\Customer_class.php';
if($_SERVER["REQUEST_METHOD"] == "POST"  )
{
    $chid=$_POST['Chid'];
    $chod=$_POST['Chod'];
    $Roomno=$_POST['rmn'];
    $Cstno=$_POST['cst'];
    $cst= new Customer();
    $cst->Checkin($Roomno,$Cstno,$chid,$chod);
    ?>
    <script>
       alert('Successfully checked in');
        window.location.href = '../View/Customer_page.php';
    </script>
<?php

exit;
}


?>