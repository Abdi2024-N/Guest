<?php
include 'Connect.php';
 class Room extends DBCon
{
    public $RoomNo ;
    public $RoomRent; 
    public $RoomStatus; 
    public $Bedno ;
    public $Ac;
    
    function GetRno()
    {
        $conn=$this->connect();
        $Qry= "select COUNT(*) from rooms;";
        $res = $conn->query($Qry);
        $row=$res->fetch_array();
        return $row[0];
    }
    
    public function AddRoom($roomrent,$roomstatus,$bedno,$ac)
    {
        $this->RoomNo = $this->GetRno()+100;
        $this->RoomRent = $roomrent;
        $this->RoomStatus = $roomstatus;
        $this->Bedno = $bedno;
        $this->Ac =$ac;
        $conn= $this->connect();

        $conn->query("insert into rooms values($this->RoomNo,$this->RoomRent,'$this->RoomStatus',$this->Bedno,'$this->Ac');");
    }
    
}



?>