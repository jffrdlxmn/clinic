<?php
    include('../../model/vendorModel.php');
    $vendor = new Vendor();
    
    if(isset($_POST['name']))
    {
        $received = $vendor->save($_POST['name'],$_POST['number'],$_POST['email'],$_POST['website']);
        if($received == 1)echo '1';   
    }
?>


