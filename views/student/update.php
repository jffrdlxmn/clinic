<?php
    date_default_timezone_set('Asia/Manila');
    include('../../model/studentModel.php');
    $student = new Student();
    $date= date("d/m/Y");

   
    if(isset($_POST["id"],$_POST["name"],$_POST["programId"],$_POST['healthStatus'])){
        $received = $student->update($_POST["id"],$_POST["name"],$_POST["programId"],$_POST['healthStatus'],$date);
        if($received == 1)echo '1';   
    }

    
?>


