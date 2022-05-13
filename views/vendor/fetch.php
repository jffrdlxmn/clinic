<?php
    include('../../model/vendorModel.php');
    $vendor = new Vendor();
    $datas = $vendor->fetch();

?>
<table  id="myTable" class="table  table-striped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">Company Name</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Company Number</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Company Website</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Company Email Address </th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Date Updated</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $datas as $data)
       {
    ?>
             <tr role="row">   
                <td  role="cell"><?php echo $data['name'] ; ?></td>  
                <td  role="cell"><?php echo $data['number'] ; ?></td>  
                <td  role="cell"><?php echo $data['website'] ; ?></td>  
                <td  role="cell"><?php echo $data['email'] ; ?></td>  
                <td  role="cell"><?php echo $data['history'] ; ?></td>  
                <td  role="cell" >
                    <button type="button"  onclick="openUpdateModal(`<?php echo $data['id']; ?>`,`<?php echo $data['name']; ?>`
                    ,`<?php echo $data['number']; ?>`,`<?php echo $data['website']; ?>`,`<?php echo $data['email']; ?>`)" class="btn btn-success btn-sm">Update</button>
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