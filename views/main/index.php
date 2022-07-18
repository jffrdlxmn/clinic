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
  <link rel="icon" href="../../dist/img/AdminLTELogo.png">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
        <div class="card p-1">
          <div class="body">
            <div class="conatiner">

            
              <div class="row">

                <div class="col-md-4 p-2 " >
                  <div class="card" style="height:450px;">
                    <div class="card-body">
                      <h4 class="text-center rounded" style=" background-color: #004d28;color:white;">Student Information</h4>
                      <div id="counterFetch"></div>
                      <small ><b>Name</b></small>
                      <input type="text" class="form-control"  id="name" autocomplete="off" placeholder="Enter Name" oninput="this.value = this.value.toUpperCase()"> 
                      <small ><b>Program</b></small>
                      <div class="rounded" style="border: 0.5px solid #004d28">
                        <select name="program" class="form-control" id="program">
                        <option value="0" selected disabled>Select Program</option>
                          <?php ;
                          foreach($programs as $program)
                          {
                            $programId=$program['id'];
                            $program = $program['program'];
                            echo "<option value='$programId'>$program</option>";
                          }
                          ?>

                        </select>
                      </div>
                      <small ><b>Health Status</b></small>
                      <div class="rounded" style="border: 0.5px solid #004d28">
                        <select name="healthStatus" class="form-control" id="healthStatus">
                        <option value="0" selected disabled>Select Health Status</option>
                        <option value="FIT">FIT</option>
                        <option value="UNFIT">UNFIT</option>
                          

                        </select>
                      </div>
                      <button class="btn btn-success w-100 mt-3"id="generate">GENERATE</button>
                      <button class="btn btn-success w-100 mt-1"id="save" style=" background-color: #004d28;color:white;" disabled>SAVE</button>  
                    </div>
                  </div>
                </div>

                <div class="col-md-8 p-2" >  
                <div class="card" style="height:450px;">
                  <div class="card-body">
                  <iframe id="pdfViewer" src="../../reportPDF/generatePDF.php?name=
                    &program=&studentCtrlNo=&healthStatus=&embedded=true" 
                      width="100%" height="427" style="border: none;" ></iframe>

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
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>


<!-- Sweet Alert -->
<script src="../../dist/sweetalert/sweetalert_library.js"></script>
<script src="../../dist/sweetalert/sweet_alert.js"></script>
<script>

//STUDENT CONTROL NO.
jQuery('#counterFetch').load('counter.php', 'f' + (Math.random()*100000));

  
//GENERATE TO PDF  
$(document).on("click", "#generate", function() {   

  var name = $('#name').val();
  var program = $('#program').val();
  var healthStatus =$('#healthStatus').val();

  var studentCtrlNo = $('#studentCtrlNo').val();
  if(name == ""){warningfunction('Please fill up name');return false;}
  if(program == null){warningfunction('Please select program');return false;}
  if(healthStatus == null){warningfunction('Please select health Status');return false;}



  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
      confirmButton: 'btn btn-success m-1 ',
      cancelButton: 'btn btn-danger '
  },
  buttonsStyling: false
  })
  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
  text: "Please double check all data",
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Confirm',
  cancelButtonText: 'Cancel   ',
  reverseButtons: true
  }).then((result) => {
  if (result.isConfirmed) {

    url  = '../../reportPDF/generatePDF.php?name=' + name + '&program=' + program + '&studentCtrlNo=' + studentCtrlNo
    + '&healthStatus=' + healthStatus ;
    $('#pdfViewer').attr("src",url);
    //window.open(url);
    document.getElementById("save").disabled = false
  }   
  else if (result.dismiss === Swal.DismissReason.cancel){}
  })        
         
});


// SAVE
$(document).on("click", "#save", function() {   
  var name = $('#name').val();
  var program = $('#program').val();
  var studentCtrlNo = $('#studentCtrlNo').val();
  var healthStatus =$('#healthStatus').val();
  if(name == ""){warningfunction('Please fill up name');return false;}
  if(program == null){warningfunction('Please select program');return false;}
  if(healthStatus == null){warningfunction('Please select health Status');return false;}

  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
      confirmButton: 'btn btn-success m-1 ',
      cancelButton: 'btn btn-danger '
  },
  buttonsStyling: false
  })
  swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "you want to add this data?",
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Confirm',
  cancelButtonText: 'Cancel   ',
  reverseButtons: true
  }).then((result) => {
  if (result.isConfirmed) {
      $.ajax({
          url: "save.php",
          type: "POST",
          cache: false,
          data:{
            name: name,
            program: program,
            studentCtrlNo: studentCtrlNo,
            healthStatus: healthStatus,
          },
          success: function(data){  
              if(data == 1)
              {
                jQuery('#counterFetch').load('counter.php', 'f' + (Math.random()*100000));
                $('#name').val('');
                $('#program').val(0);
                $('#healthStatus').val(0);
                url  = '../../reportPDF/generatePDF.php?name=' + '' + '&program=' + '' + '&studentCtrlNo=' + '' + '&healthStatus=' + '' ;
                $('#pdfViewer').attr("src",url);
                success('Data Added Successfully!');
                document.getElementById("save").disabled = true
              }
              else{
                  alert(data);
                  errorfunction('Data Adding Failed!');
              }
          }
      });
  }   
    else if (result.dismiss === Swal.DismissReason.cancel){}
    })        
})    

</script>
</body>
</html>
