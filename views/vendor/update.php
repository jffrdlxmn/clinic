<?php
    include('../../model/vendorModel.php');
    $vendor = new Vendor();

    if(isset($_POST["id"],$_POST["name"])){
        $received = $vendor->update($_POST["id"],$_POST['name'],$_POST["number"],$_POST["website"],$_POST["email"]);
        if($received == 1)echo '1';   
    }
    
?>




