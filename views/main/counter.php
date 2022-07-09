<?php date_default_timezone_set('Asia/Manila'); ?>
<small ><b>Student Control No.</b> </small>
<input type="text" class="form-control"  id="studentCtrlNo" autocomplete="off" 
value="<?php 
$milliseconds = date_create()->format('v');
echo date("Y") . date("m") . date("d") . date('H') . date('i') . date('s') .$milliseconds

;?>" disabled>