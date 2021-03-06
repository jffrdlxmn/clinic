<?php
    include('../../model/studentModel.php');
    $student = new Student();
    $datas = $student->fetch();

?>
<table  id="myTable" class="table table-striped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">Control No.</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Name</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Program</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Health Status</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Date</th>
            
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $datas as $data)
       {
    ?>
            <tr role="row">   
                <td  role="cell"><?php echo $data['studentCtrlNo']; ?></td>  
                <td  role="cell"><?php echo $data['fullname']; ?></td>  
                <td  role="cell"><?php echo $data['program']; ?></td>  
                <td  role="cell"><?php echo $data['healthStatus']; ?></td>  
                <td  role="cell"><?php echo $data['date']; ?></td>  
                <td  role="cell">
                    <button type="button"  onclick="openUpdateModal(`<?php echo $data['id']; ?>`,`<?php echo $data['fullname']; ?>`,`<?php echo $data['programId']; ?>`,`<?php echo $data['studentCtrlNo']; ?>`,`<?php echo $data['healthStatus']; ?>`)" class="btn btn-success btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                    <button type="button"  onclick="openPrintModal(`<?php echo $data['fullname']; ?>`,`<?php echo $data['programId']; ?>`,`<?php echo $data['studentCtrlNo']; ?>`,`<?php echo $data['healthStatus']; ?>`)" 
                    class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button>

                    <button type="button"  onclick="Delete(`<?php echo $data['id']; ?>`)" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td> 
            </tr>
    <?php
       }
    ?>    
    </tbody>
</table>



<script>
    $(document).ready( function () {
       
        var oTable = $('#myTable').dataTable({
        "lengthChange": false,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bFilter": true,
        
        }); 
        $('#selectProgram').on('change',function(){
          var selectedValue = $(this).val();
          if (selectedValue == 'All')
          {
            oTable.fnFilter('',2);
          }
          else{
            oTable.fnFilter("^"+selectedValue+"$", 2, true); //Exact value, column, reg
          }
        });
  
     
    } );
</script>            
