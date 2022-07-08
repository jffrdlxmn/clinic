<?php
    
    include('../../model/programModel.php');
      $program = new Program();

    if(isset($_POST["programId"],$_POST["programName"])){
        $received = $program->update($_POST["programId"],$_POST['programName']);
        if($received == 1)echo '1';   
    }
    
?>




