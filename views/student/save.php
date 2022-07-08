<?php
      include('../../model/programModel.php');
      $program = new Program();
    
    if(isset($_POST['program']))
    {
        $received = $program->save($_POST['program']);
        if($received == 1)echo '1';   
    }
?>
