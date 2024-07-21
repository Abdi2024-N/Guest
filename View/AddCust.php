<?php
session_start();
include '..\Model\Customer_class.php';

?>
<?php
//if(isset($_SESSION['usrn']))
//{
if ($_SERVER["REQUEST_METHOD"] == "POST"  && !isset($_SESSION['AddCust']))
{
    if($_POST['pass'] == $_POST['pass2'])
    {
        $cust =new Customer();
        $fn=$_POST['Fn'];
        $ln= $_POST['Ln'];
        $gn=$_POST['Gn'];
        $phn= $_POST['Phn'];
        $pass=$_POST['pass'];
        $cust->AddCust($fn,$ln,$gn,$phn,$pass);
        
        $_SESSION['Addcust'] = true;
        header("Location:index.php");
    exit;
        
        
     }
     else{ 
        
        header("Location: " . $_SERVER['PHP_SELF']);
      
    exit;
     }
     
}

//header("Location: " . $_SERVER['PHP_SELF']);


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
    width: 100%;
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
<?php include 'header.php'; ?>
 <div class="bdy">
<div class="form-container">
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <legend>Registration Form</legend>
    <table>
    <tr>
        <td>
            Customer Number
        </td>
        <td>
            <input type="text" name="Cstn" id="Cstn" required readonly value=<?php $cst =new Customer();
            echo $cst->CalCstn()+500; ?>>
        </td>
    </tr>
    <tr>
        <td>First Name</td>
        <td>
            <input type="text" name="Fn" id="Fn" required  pattern="[A-Za-z ]{3,}">
        </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><input type="text" name="Ln" required id="Ln" pattern="[A-Za-z ]{3,}"></td >
    </tr>
    <tr>
        <td>Gender</td>
        <td><select name="Gn" id="gn" required>
            <option value="" false></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select></td >
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input type="text" name="Phn" required id="Phn"></td required>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="pass" id="pass" required></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="pass2" id="pass2" required placeholder="Re-Enter Password"></td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <input onclick="getTextValue()" type="submit" value="Sign-up" name="Register">
        </td>
    </tr>
</table>
</form>
</div>
</div>   

<?php include 'Footer.php'; ?>
<script>
function getTextValue() {
    if(document.getElementById('Fn').value!=="" && document.getElementById('Ln').value!=="" && document.getElementById('Phn').value!=="" && document.getElementById('pass').value!=="" && document.getElementById('pass2').value!=="" && document.getElementById('gn').value!=="" )
    {
        if(/^[a-zA-Z]+$/.test(document.getElementById('Fn').value) && /^[a-zA-Z]+$/.test(document.getElementById('Ln').value))
        {
         if(document.getElementById('pass').value === document.getElementById('pass2').value)
          {
        var fn = document.getElementById('Fn');
        var cstn = document.getElementById('Cstn');
        var txt= "Your User Name is " + fn.value +"@"+ cstn.value;       
        alert(txt);
         }
         else{
        alert('Please enter the same Password');
              }
        }
       else{
    alert('Please enter alphabet only for first name & lastname ');
            }
    }  
}
</script>
<?php
//}
?>