<?php 
session_start();
include '..\Model\Room_Class.php';
 include "header.php";
?>

<?php
if(isset($_SESSION['usrn']))
{
if($_SERVER["REQUEST_METHOD"] == "POST"  )
{
$room= new Room();
$RN=$_POST['roomrent'];
$Rs=$_POST['RoomSt'];
$BN=$_POST['BN'];
$Ac=$_POST['Ac'];
$room->AddRoom($RN,$Rs,$BN,$Ac) ; 

header("Location:AddRoom.php" );
exit;

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
.form-container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
}

.form-container table {
    width: 100%;
    border-collapse: collapse;
}

.form-container td {
    padding: 10px;
    vertical-align: middle;
}

.form-container input[type="text"],
.form-container select {
    width: calc(100% - 20px);
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-container input[type="submit"] {
    width: 100%; /* Make the button wider */
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.form-container input[type="submit"]:hover {
    background-color: #45a049;
}

.form-container td:first-child {
    font-weight: bold;
    text-align: right;
    padding-right: 10px;
}

.form-container td:last-child {
    text-align: left;
}
legend{
    font-weight: bold;
    text-align:center;
}
</style>    
<div class="bdy">
<div class="form-container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <legend>Add Room Form</legend>
    <table>
        <tr>
            <td>
                Room Number
            </td>
            <td>
                <input type="text" name="Roomnum" id="" readonly value=<?php $x=new Room();
                echo $x->GetRno()+100 ;
                ?>>
                
            </td>
        </tr>
        <tr>
            <td>
                Room Type
            </td>
            <td>
                <select name="roomrent" id="roomrent" required>
                    <option value="" false></option>
                    <option value="19" > Standard (19$)</option>
                    <option value="49" >Lexury (49$)</option>
                    <option value="299" >Presidential (299$)</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Number of Beds</td>
            <td>
                <select name="BN" id="bn" required>
                    <option value="" false></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>With Ac or No</td>
            <td>
                <select name="Ac" id="ac" required>
                    <option value="" false></option>
                    <option value="A">with AC</option>
                    <option value="N">Without Ac</option>
                    
                </select>
            </td>
        </tr>
        <tr>
        <td>
                Room Status
            </td>
            <td>
                <input type="text" name="RoomSt" id="" readonly value='A'>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input onclick="display()" type="submit" value="Add Room" name="Addroom">
            </td>
        </tr>
    </table>
</form>

</div>
</div>
<script>
    function display()
    {
        if(document.getElementById('roomrent').value!=="" && document.getElementById('bn').value!=="" && document.getElementById('ac').value!=="")
        {
        alert("Room Added Successfully");
        }
    }
</script>
<?php
include "Footer.php";
}
else{
    header("location:index.php");
}
?>