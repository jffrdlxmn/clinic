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
  <link rel="stylesheet" href="../../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
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
        <div class="card p-2">
          <div class="body">
            <div class="conatiner">

            
              <div class="row">

                <div class="col-md-4 p-2">
                  <div class="card">
                    <div class="card-body">
                      <h4 class=" bg-green text-center">Student Information</h4>
                      <small ><b>Student No.</b> </small>
                      <input type="text" class="form-control"  id="studentCtrlNo" autocomplete="off" value="201510121" disabled>
                      <small ><b>Name</b></small>
                      <input type="text" class="form-control"  id="name" autocomplete="off" placeholder="Enter Name">
                      <small ><b>Program</b></small>
                
                      <select name="program" class="form-control inputField" id="program">
                      <option value="0" selected disabled>Select Program</option>
                        <?php ;
                        foreach($programs as $program)
                        {
                          $programId=$program['id'];
                          $program = $program['program'];
                          echo "<option value='$program'>$program</option>";
                        }
                        ?>
                        
                      </select>
                      <button class="btn btn-success w-100 mt-3"id="generate">GENERATE</button>
    
                    </div>
                  </div>
                </div>

                <div class="col-md-8 p-2">
                <div class="card">
                  <div class="card-body">
                  <iframe id="pdfViewer" src="../../reportPDF/generatePDF.php?name=
                    &program=&studentCtrlNo=&embedded=true" 
                      width="100%" height="427" style="border: none;"></iframe>

                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>


     
        
       


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
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<script src="../../dist/sweetalert/sweetalert_library.js"></script>
<script src="../../dist/sweetalert/sweet_alert.js"></script>




<script>
  $(document).on("click", "#generate", function() { 
    var name = $('#name').val();
    var program = $('#program').val();
    var studentCtrlNo = $('#studentCtrlNo').val();
   
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-primary m-1 ',
        cancelButton: 'btn btn-danger '
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "Please double check all data",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Proceed',
    cancelButtonText: 'Cancel   ',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {

      
     
      url  = '../../reportPDF/generatePDF.php?name=' + name + '&program=' + program + '&studentCtrlNo=' + studentCtrlNo ;
      $('#pdfViewer').attr("src",url);
      //window.open(url);
    }   
    else if (result.dismiss === Swal.DismissReason.cancel){}
    })        
     


      
        
  });
</script>
</body>
</html>
