<?php
session_start();
include '..\Model\Room_Class.php';

include "header.php";
if(isset($_SESSION['usrn']))
{

    $conn= mysqli_connect("localhost","root","","project");
    $qry="select * from rooms where RoomStatus ='A';";
    $res = mysqli_query($conn,$qry);
    
   

    ?>
    <style>
    .bdy{
        min-height:100vh;
        width:100%;
        background-image:url("img/bck-1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
        display:flex;
        justify-content:space-evenly;
        align-items:center; 
        flex-wrap:wrap;
        gap: 10px;
    }
.room-details {
    
    margin: 0 auto;
    padding: 20px;
    background-color: #f0f7f7; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: Arial, sans-serif;
    overflow:hidden;
    
}

.room-details table {
    width: 100%;
    border-collapse: collapse;
}

.room-details td {
    padding: 15px;
    border-bottom: 1px solid #b0bec5; 
    color: #37474f; 
}

.room-details td:first-child {
    font-weight: bold;
    color: #0288d1; 
}

.room-details td:last-child {
    text-align: right;
}


.room-details tr:nth-child(even) {
    background-color: #e1f5fe; 
}


.room-details tr:hover {
    background-color: #b3e5fc; 
}
@media only screen and (max-width: 800px) {
            .bdy{
                display: flex;
            flex-direction: column; 
            align-items: center;
            gap: 10px;

            }
        }
</style>
    <div class="bdy">
    <?php

if(mysqli_num_rows($res)>0){
    
while($row=mysqli_fetch_array($res))
{
?>

<div class="room-details" >
    <table>
        <tr>
            <td>Room Number</td>
            <td><?php echo $row['RoomNo'];?></td>
        </tr>
        <tr>
            <td>Room Type </td>
            <td><?php if($row['RoomRent']=='299') echo "Presidential (299$)";if($row['RoomRent']=='49') echo "Lexury (49$)";if($row['RoomRent']=='19') echo "Standard (19$)";?></td>
        </tr>
        <tr>
            <td>Number of Beds</td>
            <td><?php echo $row['Bedno'];?></td>
        </tr>
        <tr>
            <td>AC</td>
            <td>
                <?php
                if($row['Ac']==='A') echo "With Ac";
                else echo "Without Ac";
                ?>
            </td>
        </tr>
    </table>
</div>
<br>
<?php
}

}
else{
    ?>
   <div class="room-details" > 
    <table>
        <tr>
            <td></td>
        </tr>
    <tr>
        <td onclick=" window.location.href = 'Admin.php';">No Available Room</td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table></div>
    <?php
}
?>
</div>
<?php
include "Footer.php";
}
else{
    header("location:index.php");
}
?>