<?php

 session_start();
 //session_destroy();
if(isset($_SESSION['usrn']))
{
    $usrnm=$_SESSION['usrn'];

?>
<style>
    
    .bdy{
        min-height:100vh;
        width:100%;
        background-image:url("img/bck-1.jpg");
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .button-container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: Arial, sans-serif;
    text-align: center;
}

.button-container table {
    width: 100%;
    border-collapse: collapse;
}

.button-container td {
    padding: 10px;
}

.button-container .btn {
    width: 100%; /* Make the button wider */
    padding: 10px 15px;
    font-size: 16px;
    color: white;
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    text-decoration: none;
}

.button-container .btn:hover {
    background-color: #45a049;
}
</style>
<?php include "header.php"; ?>
<div class="bdy">
    <div class="button-container">
    <table >
        <tr>
            <td><a href="AddRoom.php"><button class="btn">Add Room</button></a></td>
        </tr>
        <tr>
        <td><a href="Available Rooms.php"><button class="btn">Avialable Rooms</button></a></td>
        </tr>
        <tr>
        <td><a href="AccountTbl.php"><button class="btn">Account Table</button></a></td>
        </tr>
    </table>
</div>
</div>
<?php
include "Footer.php";
}

else{
    header("location:index.php");
}
?>