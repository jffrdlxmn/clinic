
<?php
    include('../../model/vendorModel.php');
    $vendor = new Vendor();
    
    if(isset($_POST['name']))
    {
        $checkDulplicate = $vendor->checkExist($_POST['name']);
        if($checkDulplicate == 1)echo '1';   
    }
?>

