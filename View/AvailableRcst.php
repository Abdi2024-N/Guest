<?php
session_start();
if(isset($_SESSION['Acn']))
{
$Custno =$_SESSION['Acn'];
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
    .contain {
   overflow:hidden;
    margin: 0 auto;
    padding: 20px;
    background-color: #f0f7f7; /* Light cyan */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: Arial, sans-serif;
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
        a {
            text-decoration: none;
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
<?php include 'header.php' ?>
<div class=bdy>
<?php
if(mysqli_num_rows($res)>0){
while($row=mysqli_fetch_array($res))
{
   
?>
<div class="contain" >
    <table>
    <caption>Room Information</caption>
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
            <td>
                AC 
            </td>
            <td>
                <?php
                if($row['Ac']==='A') echo "With Ac";
                else echo "Without Ac";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><a href="Checkin.php?rnm=<?php echo $row['RoomNo'];?>"><button>Select</button></a></td>
        </tr>
    </table>
</div>

<?php
}
}
else{
    ?>
    <div class="contain" >     
              <button onclick="window.location.href = 'Customer_page.php';" >No Available Rooms</button>
    </div>
    <?php
}
?>
</div>
<?php
include 'Footer.php';
}
else{
    header("location:index.php");
}
?>