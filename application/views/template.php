<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WEBTest | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/skins/_all-skins.min.css">
  <!-- DataTable -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script type="text/javascript" src="<?=base_url('assets')?>/dist/date_time.js"></script>

<style>
  .custom{
    padding-top: 8px;
  }
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <?php 
      $token = $this->session->userdata('token');
      foreach($token as $tok){
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', 'http://backend-dev.cakra-tech.co.id/api/user', [
          'headers' => [
            'Authorization' => 'Bearer '.$tok
          ]
        ]);
        $user = json_decode($request->getBody(true)->getContents('action'));
      }
     ?>
    <!-- Logo -->
    <a href="<?=base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WE</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WEB</b> Test</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="asd">
              <i class="hidden-xs" id="date_time"></i>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php foreach($user as $u): ?>
              <span class="hidden-xs"><?=$u->name?></span>
              <?php endforeach ?>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?=base_url('assets')?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?=$u->name?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <button class="btn btn-flat btn-default" data-toggle="modal" data-target="#changePass">Change Password</button>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign Out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets')?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$u->name?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('dashboard/country')?>">
            <i class="fa fa-flag"></i> <span>Country Data</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('province')?>">
            <i class="fa fa-map-marker"></i> <span>Province Data</span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('city')?>">
            <i class="fa fa-building"></i> <span>City Data</span>
          </a>
        </li>
      </ul>
  </aside>
  <div class="content-wrapper">
    <?php echo $contents ?>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> BETA
    </div>
    <strong>Copyright &copy; <?=date('Y')?> <a href="https://www.facebook.com/bafaqih23" target="_blank">Muhammad Bafaqih</a>.</strong>
  </footer>
<!-- jQuery 3 -->
<script src="<?=base_url('assets')?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets')?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=base_url('assets')?>/bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets')?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url('assets')?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTable -->
<!-- <script src="<?=base_url('assets')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets')?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets')?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url('assets')?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url('assets')?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('assets')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url('assets')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets')?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets')?>/dist/js/demo.js"></script>
<script type="text/javascript">
  window.onload = date_time('date_time');
</script>
<script type="text/javascript">
$("ul a").click(function(e) {
    var link = $(this);

    var item = link.parent("li");

    if (item.children("ul").length > 0) {
        var href = link.attr("href");
        link.attr("href", "#");
        setTimeout(function () { 
            link.attr("href", href);
        }, 300);
        e.preventDefault();
    }
})
.each(function() {
    var link = $(this);
    if (link.get(0).href === location.href) {
        link.addClass("active").parents("li").addClass("active");
        return false;
    }
});
</script>
<script>
  $('#tableAll').DataTable()
</script>
</body>
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
      <form action="<?=base_url('dashboard/changePass')?>" method="post" onsubmit="return confirm('are you sure want to change password?')">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label>Old Password</label>
            </div>
            <div class="col-md-9">
              <input type="password" class="form-control" name="oldPassword" required>
            </div>
          </div>
          <div class="row custom">
            <div class="col-md-3">
              <label>New Password</label>
            </div>
            <div class="col-md-9">
              <input type="password" class="form-control" name="newPassword" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
</html>