<?php
    include('../../model/assetConditionModel.php');
    $condition = new assetCondition();
    $datas = $condition->fetch();

?>
<table  id="myTable" class="table table-striped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">Condtion</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $datas as $data)
       {
    ?>
            <tr role="row">   
                <td  role="cell"><?php echo $data['condition']; ?></td>  
                <td  role="cell">
                    <button type="button"  onclick="openUpdateModal(`<?php echo $data['id']; ?>`,`<?php echo $data['condition']; ?>`)" class="btn btn-success btn-sm">Update</button>
                    <button type="button"  onclick="Delete(`<?php echo $data['id']; ?>`)" class="btn btn-danger btn-sm">Delete</button>
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
