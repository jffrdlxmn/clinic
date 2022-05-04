<?php
    include('../../model/assetDepreciationModel.php');
    $type = new assetDepreciation();
    $datas = $type->fetch();

?>
<table  id="myTable" class="table table-stripped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">METHOD</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $datas as $data)
       {
    ?>
            <tr role="row">   
                <?php 
                $rbr = $data['rbr'];
                if($data['rbr'] != 0 ) $rbr  = $rbr  ."% "; 
                else $rbr  = '';
                
                ?>
                <td  role="cell"bgcolor="#FFF"><?php echo $rbr  . $data['description'] ; ?></td>  
                <td  role="cell" bgcolor="#FFF" >
                    <button type="button"  onclick="openUpdateModal(`<?php echo $data['id']; ?>`,`<?php echo $data['description']; ?>`,`<?php echo $data['rbr']; ?>`)" class="btn btn-success btn-sm">Update</button>
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