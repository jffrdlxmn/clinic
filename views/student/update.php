<?php
    
    include('../../model/studentModel.php');
    $student = new Student();
   
    if(isset($_POST["id"],$_POST["name"],$_POST["programId"])){
        $received = $student->update($_POST["id"],$_POST["name"],$_POST["programId"]);
        if($received == 1)echo '1';   
    }

    
?>




