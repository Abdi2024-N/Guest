<?php
session_start();
include '..\Model\Customer_class.php';
if(isset($_SESSION['usrn']))
{

$CustNo= substr($_SESSION['usrn'],-3);
$conn=  mysqli_connect("localhost","root","","project");
$qry="select * from customer where AccNo= $CustNo ;";
$result= mysqli_query($conn,$qry);
$row= mysqli_fetch_array($result);
$rnum= $row['roomNo'];
$chot=$row['CheckOut'];
$chit=$row['CheckIn'];
$qry2="select RoomRent from rooms where RoomNO= $rnum;";
$result2= mysqli_query($conn,$qry2);
$row2= mysqli_fetch_array($result2);
$Dailyrent=$row2[0];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $chot=$_POST['cout'];
    $cust = new Customer();
    $cust->checkOut($rnum,$CustNo,$_POST['cin'],$_POST['cout']);
    ?>
    <script>
         alert("You Checked out Successfully.");
        window.location.href = 'Customer_page.php';
        
    </script>
    <?php
    
}

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
        input[type="date"],
        input[type="number"],
        input[type="submit"],
        input[type="button"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%; /* Make inputs span full width */
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #go{
            display:none;
        }
</style>
<?php include 'header.php' ?>
<div class="bdy">
<div class="contain">
    <table>
        <caption>Check-out Form</caption>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <tr>
            <td>Date of Check-in</td>
            <td><input required readonly type="date" name="cin" id="cin" value="<?php echo $chit; ?>"></td>
        </tr>
        
        <tr>
            <td>Date of Check-out</td>
            <td><input type="date" value=<?php echo $chot; ?> name="cout" required id="cout"></td>
            
        </tr>
        <tr>
            <td>Number of Days</td>
            <td><input readonly type="number" name="ND" id="nd"  required></td>
        </tr>
        <tr>
            <td>Daily Room rent</td>
            <td><input readonly required value="<?php echo $Dailyrent; ?>"type="number" name="dr" id="dr"></td>
        </tr>
        <tr>
            <td>Total Payement</td>
            <td><input required readonly  type="number" name="num" id="py"></td>
        </tr>
        <tr>
            <input type="hidden" name="hd">
        </tr>
        <tr>
            <td></td>
             <td class="button-container">
                    <input onclick="Check()" type="button" value="Calculate Total" id="ct">
                    <input  type="button" id="go" value="Check-out" >
                </td>
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
<script>
    function Check()
    {
        var ch = confirm("Are you certain about the check-out date?");
        if(ch)
        {
            function calculateDaysBetweenDates(date1, date2) {
            
            var startDate = new Date(date1);
            var endDate = new Date(date2);
            var timeDifference = endDate - startDate;
            var daysDifference = timeDifference / (1000 * 3600 * 24);
            return daysDifference;
        }
        document.getElementById('cout').readOnly=true;
        document.getElementById('nd').value=calculateDaysBetweenDates(document.getElementById('cin').value, document.getElementById('cout').value)
        document.getElementById('py').value=document.getElementById('nd').value *document.getElementById('dr').value
        
        document.getElementById('ct').style.display ="none"
        document.getElementById('go').type ="submit";
        document.getElementById('go').style.display="inline-block";

         
        }
    }
</script>