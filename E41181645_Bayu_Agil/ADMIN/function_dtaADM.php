<?php
require 'connection.php';
$Data_plg = mysqli_query($conn, "SELECT* FROM user");

    function Data_plg($Data_plg) {
        global $conn;
    
        $result = mysqli_query($conn, $Data_plg);
        $rows   = [];
        while($row  = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
    }
?>
