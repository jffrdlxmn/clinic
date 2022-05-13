<?php
    include('../../model/assetStatusModel.php');
    $controller = new assetStatus();
    $status = $controller->fetch();

?>
<table  id="myTable" class="table table-striped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">Status</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $status as $stat)
       {
    ?>
            <tr role="row">   
                <td  role="cell"><?php echo $stat['status']; ?></td>  
                <td  role="cell">
                    <button type="button"  onclick="openUpdateModal(`<?php echo $stat['id']; ?>`,`<?php echo $stat['status']; ?>`)" class="btn btn-success btn-sm">Update</button>
                    <button type="button"  onclick="Delete(`<?php echo $stat['id']; ?>`)" class="btn btn-danger btn-sm">Delete</button>
                </td> 
            </tr>
    <?php
       }
    ?>    
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>            
