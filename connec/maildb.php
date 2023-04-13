<?php
 $tmp_name="/home/eutilosb/tmp";//must change as per production server
 $mysqli = new mysqli("localhost", "eutilosb_prasenj", "GmZ)6-d?RCk,!NALh", "eutilosb_officeletters_test");
 class Database

 {
     private $_host = 'localhost';
     private $_username = 'eutilosb_prasenj';
     private $_password = 'GmZ)6-d?RCk,!NALh';//GmZ)6-d?RCk,!NALh///Mageba@6789
 
     private $_database = 'eutilosb_officeletters_test';
     public $conn;
     public function __construct()
     {
         $this->conn = mysqli_connect($this->_host, $this->_username, $this->_password, $this->_database);
         if (!$this->conn) {
             die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
         } else { //echo "connected";
         }
     }
     public function select($stblname, $whe)
     {
         $array = array();
         $qs = "SELECT * FROM " . $stblname . " " . $whe . "";
         // echo $qs;
         $rs = mysqli_query($this->conn, $qs);
         while ($rw = mysqli_fetch_array($rs)) {
             $array[] = $rw;
         }
         return $array;
     }
 
    public function select_sel($stblname, $whe,$sel){
        $array=array();
        $qs="SELECT ".$sel." FROM ".$stblname." ".$whe."";
        //echo "<br>".$qs;
        $rs=mysqli_query($this->conn, $qs);
        while($rw=mysqli_fetch_array($rs))
        {
            $array[]=$rw;
        }
        return $array;
    }

    public function select_count($tablename, $where, $groupBy){
        $qs="SELECT COUNT(*) as `tot_count` FROM ".$tablename." ".$where." GROUP BY `".$groupBy."`";
        $rs=mysqli_query($this->conn, $qs);
        $rw = mysqli_fetch_assoc($rs);
        if(isset($rw['tot_count']) && $rw['tot_count']>0){
            return $rw['tot_count'];            
        }else{
            return 0;
        }        
    }
 }
    include('group_emailids.php');
 $salutation="Hi, We are from Test-Zone-MaINStream";
 $end="<div style='color:blue;font-weight:700;'>Email from TEST ZONE-MaINStream.</div>
        <div style='color:blue;'>Please do not reply.</div>";
?>