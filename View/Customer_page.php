<?php
session_start();
if(isset($_SESSION['usrn']))
{

$CustNo= substr($_SESSION['usrn'],-3);
$_SESSION['Acn']=$CustNo;
$conn= mysqli_connect("localhost","root","","project");
$qry="Select * from customer where AccNo = $CustNo;";
$sql=mysqli_query($conn,$qry);
$row=mysqli_fetch_array($sql);

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
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 40px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px; 
        }
        button:hover {
            background-color: #45a049;
        }
       
</style>
<?php include 'header.php'; ?>
<div class="bdy">
    <div class="contain">
        <table>
        <caption>Customer Information</caption>
            <tr>
                <td>
                    Customer Number
                </td>
                <td>
                    <?php echo $row['AccNo'] ;?>
                </td>
            </tr>
            <tr>
                <td>
                    First Name
                </td>
                <td>
                <?php echo $row['FirstName'] ;?>
                </td>
            </tr>
            <tr>
                <td>
                    Last Name
                </td>
                <td>
                <?php echo $row['LastName'] ;?>
                </td>
            </tr>
            <tr>
                <td>
                    Gender
                </td>
                <td>
                <?php echo $row['Gender'] ;?>
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number
                </td>
                <td>
                <?php echo $row['PhoneNumber'] ;?>
                </td>
            </tr>
            <?php if ($row['CheckIn']!==null && $row['CheckOut']!==null && $row['roomNo']!==null){?>
            <tr>
                <td>Check-in Date</td>
                <td><?php echo $row['CheckIn']; ?></td>

            </tr>
            <tr>
                <td>Check-out Date</td>
                <td><?php echo $row['CheckOut'] ?></td>
                
            </tr>
            <tr>
                <td>Room Number</td>
                <td><?php echo $row['roomNo'] ?></td>
                
            </tr>
            <tr>
                <td></td>
               <td><a href="checkout.php"><button>Check Out</button></a></td> 
            </tr>
            <?php }
            else{?>
            <tr>
                <td></td>
               <td><a href="AvailableRcst.php"><button>Book Room</button></a></td> 
            </tr>
            <?php }?>
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