<?php session_start();
if(isset($_SESSION["username"])){ header("location:../../views/user/"); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"  http-equiv="Content-Type" content="width=device-width, initial-scale=1">
    <title>Supply</title>
      <!-- Theme style -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- MY CSS -->
    <link rel="stylesheet" href="../../dist/css/loginCss.css">
    <link rel="stylesheet" href="../../dist/css/style.css">

</head>
<body>
<div class="container-fluid ps-md-0 bg">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-7 bg-image">
      <div class="d-flex align-items-center mx-auto">
        <img src="../../dist/img/PinClipart.com_get-well-soon-clipart_5426010.png" alt=""  width="100%" >
      </div>
    </div>
    <div class="col-md-8 col-lg-5">
      <div class="login d-flex align-items-center ">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">

              <!-- Sign In Form -->
              
                <div class="d-flex align-items-center mx-auto">
                <img src="../../dist/img/AdminLTELogo.png" alt="" heigt="30%" width="30%">
                </div>
                  
                <div class="form-floating mb-2 mt-4">
                <span id="message"></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" onkeydown="if (event.keyCode == 13){Login();}">
              
                </div>
                <div class="form-floating mb-3">

                  <input id="password" name="password" type="password" class="form-control mb-1"  placeholder="Enter Password" onkeydown="if (event.keyCode == 13){Login();}">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" id="showPass"></span>
                </div>


                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2 w-100" onclick="Login()">Sign in</button>
                </div>

         
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

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
<!-- Sweet Alert -->
<script src="../../dist/sweetalert/sweetalert_library.js"></script>
<script src="../../dist/sweetalert/sweet_alert.js"></script>

<script>

$('#showPass').on('click', function(){
      $(this).toggleClass("fa-eye fa-eye-slash");
      var passInput=$("#password");
      if(passInput.attr('type')==='password')
        {
          passInput.attr('type','text');
      }else{
         passInput.attr('type','password');
      }
})


function Login()
{ 
  if($('#username').val() == "" || $('#password').val() == "" )
  {
    return false;
  }
  
  $.ajax({
      url: "login.php",
      type: "POST",
      cache: false,
      data:{
          username: $('#username').val(),    
          password: $('#password').val(),    
      },
      success: function(data){
       
          if(data == 1)
          {
            location.href="../../views/user/";
          }
          else{
            document.getElementById('message').innerHTML= "<i class='fas fa-exclamation-circle'> </i>" + data;
            document.getElementById("username").focus();
            document.getElementById("username").value="";
            document.getElementById("password").value="";  


          }
      }
  });


}










</script>