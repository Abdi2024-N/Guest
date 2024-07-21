<?php
include 'Connect.php';
class Account extends DBCon{
   protected $UserName;
   protected $Password;
   protected $status;

   public function GetUser($cstn,$fn)
   {
    $this->UserName= $fn . "@". $cstn;
    return $this->UserName;
   }
   protected function getconn()
   {
    $xyz=$this->connect();
    return $xyz;
   }

   protected Function CreateACC($cstn,$fn,$pass)
   {
    $this->UserName= $fn . "@". $cstn;
    $this->Password = $pass;
    $this->status='A';
    $conn=new mysqli("localhost","root","","project");
    mysqli_query($conn,"insert into account values('$this->UserName','$this->Password','$this->status');");
   }

   function writetoFile($txt){
        $file_path = '..\Control\Files\Log-in__LOGS.txt';
        $file_handle = fopen($file_path, 'a');
        fwrite($file_handle, $txt);
        fclose($file_handle);
   }

  
}
class Customer extends Account{
    private $CustNo;
    private $FirstName;
    private $LastName;
    private $Gender;
    private $PhNumber;
    private $CheckinDt;
    private $CheckoutDt;

    function CalCstn()
    {
        $conn= $this->getconn();
        $Qry= "select COUNT(*) from customer;";
        $res = $conn->query($Qry);
        $row=$res->fetch_array();
        return $row[0];
    }

    Public function AddCust($fn,$ln,$gn,$phn,$pass)
    {
        $this->CustNo= $this->CalCstn()+500;
        $this->FirstName=$fn;
        $this->LastName= $ln;
        $this->Gender= $gn;
        $this->PhNumber=$phn;
        $this->CreateACC($this->CustNo,$this->FirstName,$pass);
        $conn= $this->getconn();
        $conn->query("insert into customer values($this->CustNo,'$this->FirstName','$this->LastName','$this->Gender','$this->PhNumber',null,null,null);");


    }
    public function Checkin($rn,$cstn,$chi,$cho)
    {
        $this->ChinDt=$chi;
        $this->ChinDt= $cho;

        $conn=$this->getconn();
        $conn->query("update customer set CheckIn='$chi' , CheckOut='$cho', roomNo=$rn where AccNo = $cstn;");
        $conn->query("update rooms set RoomStatus='B' where RoomNo=$rn;");
        $res=$conn->query("Select FirstName , LastName from customer where AccNo = $cstn;");
        $row=$res->fetch_array();
        $file_path = '..\Control\Files\GuestSammary.txt';
        $file_handle = fopen($file_path, 'a');
        
        $txt= $row['0']." ".$row['1']." (Customer Number:$cstn )checked in to Room  $rn at $chi .\n";
        fwrite($file_handle, $txt);
        fclose($file_handle);

    }
    public function checkOut($rn,$cstn,$chi,$cho)
    {
        
        $conn=$this->getconn();
        $conn->query("update customer set CheckIn=Null , CheckOut=Null, roomNo=Null where AccNo = $cstn;");
        $conn->query("update rooms set RoomStatus='A' where RoomNo=$rn;");
        $res=$conn->query("Select FirstName , LastName from customer where AccNo = $cstn;");
        $row=$res->fetch_array();
        $file_path = '..\Control\Files\GuestSammary.txt';
        $file_handle = fopen($file_path, 'a');
        
        $txt= $row['0']." ".$row['1']." (Customer Number:$cstn )checked out from Room  $rn at $cho .\n";
        fwrite($file_handle, $txt);
        fclose($file_handle);
    }

}

?>