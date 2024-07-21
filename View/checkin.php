<?php
session_start();

// include 'Room_Class.php';
if(isset($_SESSION['Acn'])){
$conn= mysqli_connect("localhost","root","","project");
// $RoomnoCstno=$_REQUEST['roomnocustno'];
$Roomno = $_REQUEST['rnm'];
$Cstno= $_SESSION['Acn'];
// function RR($rn)
// {
//     $qry="select * from rooms where RoomNo= $rn;";
//                 $rest=mysqli_query($conn,$qry);
//                 $roomrent=mysqli_fetch_array($rest);
//                 return $roomrent['RoomRent'];
// }


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
    .contain {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        caption {
            caption-side: top;
            font-size: 1em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        tr:nth-child(odd) {
            background-color: #f9f9f9; /* Light Gray */
        }
        tr:hover {
            background-color: #f1f1f1; /* Lighter Gray */
        }
        input[type="date"],
        input[type="submit"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%; /* Make inputs span full width */
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
<?php
include 'header.php';
?>
<div class="bdy">
    <div class="contain">
        <table>
            <caption>Check-in Form</caption>
            <tr>
                <td>Room Number</td>
                <td><?php echo $Roomno ?></td>
            </tr>
            <tr>
                <td>Room Rent</td>
                <td><?php
                 $qry="select * from rooms where RoomNo= $Roomno;";
                 $rest=mysqli_query($conn,$qry);
                 $roomrent=mysqli_fetch_array($rest);
                 echo $roomrent['RoomRent'];
                 ?></td>
            </tr>
            <tr>
                <td>
                    Number of Beds
                </td>
                <td>
                <?php
                 $qry="select * from rooms where RoomNo= $Roomno;";
                $rest=mysqli_query($conn,$qry);
                $roomrent=mysqli_fetch_array($rest);
                echo $roomrent['Bedno'];
                 ?>
                </td>
            </tr>

        <form action="../Control/checkinprocess.php" method="post">
            <tr>
                <td>Check in Date</td>
                <td><input type="date" name="Chid" id="" required></td>
            </tr>
            <tr>
                <td>Check Out Date</td>
                <td><input type="date" name="Chod" id="" required></td>
            </tr>
            <input type="hidden" name="cst" value="<?php echo $Cstno ;?>" >
            <input type="hidden" name="rmn" value="<?php echo $Roomno ;?>" >
            <tr>
                <td></td>
                <td><input type="submit" name="Check" value="Check-In" id=""></td>
            </tr>

        </form>
    </table>
    </div>
    </div>
<?php
include 'Footer.php';
}
else{
    header("location:index.php");
}
?>