<?php
session_start();
// session_destroy();
if(isset($_SESSION['usrn']))
{
    $conn= mysqli_connect("localhost","root","","project");
    $qry="select * from account;";
    $res = mysqli_query($conn,$qry);

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
    table{
        width:100% ;
        border:1;
        color:navy;
        font-size:20px;
    }
    #tr{
        background-color:#003366;
        color:white;
    }
    th, td { 
            text-align: left; 
            padding: 8px; 
        } 
        tr:nth-child(odd) { 
            background-color: #c8e6c9;; 
        }  
        tr:nth-child(even) { 
            background-color: Lightgreen; 
        } 
        .btn {
            width: 150px; /* Set the desired fixed width */
            padding: 10px;
            background-color: #ADD8E6;
            color: red;
            border: none;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #9ACDE0; /* Optional: Change background color on hover */
        }
</style>
<?php include "header.php"; ?>
<div class="bdy">
<div >
    <table>
        <tr id="tr">
            <th>
                User Name
            </th>
            <th>
                Password
            </th>
            <th>
                Status
            </th>
            <th>
                Change Status
            </th>
        </tr>
        <?php
        while($row=mysqli_fetch_array($res)){
        ?>
        <tr>
            <td><?php echo $row['UserName']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php if($row['Status']==='A') echo "Active" ; else echo"In-Active";?></td>
            <td><a href="../Control/Deactivate.php?usr=<?php echo $row['UserName'];?>"><button class="btn"><?php if($row['Status']==='A') echo "De-Activate";
            else echo "Activate";
            ?></button></a></td>
        </tr>
        <?php
        }
        ?>
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