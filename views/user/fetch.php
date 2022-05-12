<?php
    include('../../model/userModel.php');
    $user = new User();
    $datas = $user->fetch();

?>
<table  id="myTable" class="table table-stripped">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">Username</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $datas as $data)
       {
    ?>
            <tr role="row">   
                <td  role="cell"bgcolor="#FFF"><?php echo $data['username'] ; ?></td>  
                <td  role="cell" bgcolor="#FFF" >
                    <button type="button"  onclick="openUpdateModal(`<?php echo $data['id']; ?>`,`<?php echo $data['username']; ?>`)" class="btn btn-success btn-sm">Change Password</button>
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