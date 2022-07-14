<?php session_start();
if(!isset($_SESSION["username"])){ header("location:../../views/auth/"); }

include('../../model/programModel.php');
$data = new Program();
$programs = $data->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"  http-equiv="Content-Type" content="width=device-width, initial-scale=1">
  <title>Clinic</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <script src="https://kit.fontawesome.com/930a17464c.js" crossorigin="anonymous"></script>
   <!-- MY CSS -->
   <link rel="stylesheet" href="../../dist/css/style.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include("../../include/loader.php"); ?>

  <!-- Navbar -->
  <?php include("../../include/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("../../include/sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h1 class="text-success text-center">Student</h1>
        
        <div class="float-left">
        <button type="button"  onclick="getListOfStudents();" class="btn btn-success btn-sm ml-2" style="height:35px;"><i class="fa fa-print" aria-hidden="true"></i> PRINT</button>
        </div>
        <div class="float-right">
          <div class="rounded" style="border: 0.5px solid #004d28;">
            <select name="selectProgram" class="form-control" id="selectProgram" style="height:33px;">

            <option value="0" selected disabled>Select Program</option>
            <option value="All">All</option>
              <?php ;
              foreach($programs as $data)
              {
                $program = $data['program'];
                echo "<option value='$program'>$program</option>";
              }
              ?>

            </select>
          </div>
        </div>
        


        <!-- DATA TABLE -->
            <div id="studentFetch"></div>
        <!-- END DATA TABLE -->
      
        <!-- MODALS -->
        <?php include('../../modals/studentModal.php'); ?>
        <!-- END MODALS -->


        
       


      </div>
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <?php include("../../include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- Sweet Alert -->
<script src="../../dist/sweetalert/sweetalert_library.js"></script>
<script src="../../dist/sweetalert/sweet_alert.js"></script>

<script>
 jQuery('#studentFetch').load('fetch.php', 'f' + (Math.random()*100000));
</script>

<script>

 
var printModal = document.getElementById("printModal");
function openPrintModal(name,program,studentCtrlNo)
{
  printModal.style.display = "block";
  url  = '../../reportPDF/generatePDF.php?name=' + name + '&program=' + program + '&studentCtrlNo=' + studentCtrlNo ;
    $('#pdfViewer').attr("src",url);
 
}

function getListOfStudents()
{
  program = $('#selectProgram').val();
  url  = '../../reportPDF/summaryPDF.php?program=' + program  ;
    $('#pdfViewer').attr("src",url);
  window.open(url)
}


var updateModal = document.getElementById("updateModal");
function openUpdateModal(id,name,program,studentCtrlNo)
{
  updateModal.style.display = "block";
  document.getElementById("updateStudentId").value=id;
  document.getElementById("originalProgram").value=program;
  document.getElementById("originalName").value=name;
  document.getElementById("updateStudentName").value=name;
  document.getElementById("updateStudentProgram").value=program;
  document.getElementById("UpdateStudentCtrlNo").value=studentCtrlNo;
}


$(document).on("click", "#updateStudentBtn", function() { 

if($('#originalProgram').val() == $('#updateStudentProgram').val() && $('#originalName').val() == $('#updateStudentName').val())
{
  warningfunction('No changes!');
  return false;
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
      confirmButton: 'btn btn-success m-1 ',
      cancelButton: 'btn btn-danger '
  },
  buttonsStyling: false
  })
  swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "you want to update this data?",
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Confirm',
  cancelButtonText: 'Cancel   ',
  reverseButtons: true
  }).then((result) => {
  if (result.isConfirmed) {
      $.ajax({
          url: "update.php",
          type: "POST",
          cache: false,
          data:{
            id: $('#updateStudentId').val(),
            name: $('#updateStudentName').val(),
            programId: $('#updateStudentProgram').val()
          },
          success: function(data){
              if(data == 1)
              {
                  success('Data updated successfully!');
                  updateModal.style.display = "none";
                  jQuery('#studentFetch').load('fetch.php', 'f' + (Math.random()*100000));
              }
              else{
                  alert(data);
                  errorfunction('Data Updating Failed!');
              }
          }
      });
  }   
  else if (result.dismiss === Swal.DismissReason.cancel){}
  })   	
});
     

   	



function Delete(id)
{
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success m-1 ',
        cancelButton: 'btn btn-danger '
    },
    buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "you want to delete this data?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Confirm',
    cancelButtonText: 'Cancel   ',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
          $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            data:{
              id: id
            },
            success: function(data){
                if(data == 1)
                {
                  success('Data Deleted successfully!');
                  jQuery('#studentFetch').load('fetch.php', 'f' + (Math.random()*100000));
                }
                else{
                    alert(data);
                    errorfunction('Data Deleting Failed!');
                }
            }
        });
    }   
      else if (result.dismiss === Swal.DismissReason.cancel){}
  })
}




// When the user clicks button close
function closebtn() 
{
    printModal.style.display = "none";
    updateModal.style.display = "none";
}   
</script>

</body>
</html>
