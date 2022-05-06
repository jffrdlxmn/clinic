<?php
    session_start();
    include('../../model/userModel.php');
    $user = new User();
    
    if(isset($_POST['username'],$_POST['password']))
    {
        
        $received = $user->login($_POST['username'],$_POST['password']);
        echo $received;  
     
    }
?>

