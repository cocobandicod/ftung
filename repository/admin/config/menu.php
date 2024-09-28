<?php
function head(){

session_start();
if (!isset($_SESSION['nama_lengkap']))
{
	echo "<script>
	document.location='../login.html'</script>"; 
	exit;
		exit;
}	
?><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator | Fakultas Teknik Repository</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	</head>
<?php	
}
function head2(){

session_start();
if (!isset($_SESSION['nama_lengkap']))
{
	echo "<script>
	document.location='../login.html'</script>"; 
	exit;
		exit;
}	
?>	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator | Fakultas Teknik Repository</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
	<script type="text/javascript" src="js/2jquery.js"></script>
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#fakultas").change(function(){
        var fakultas = $("#fakultas").val();
        $.ajax({
            url: "web/ambiljurusan.php",
            data: "fakultas="+fakultas,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#jurusan").html(msg);
            }
        });
      });
      $("#jurusan").change(function(){
        var jurusan = $("#jurusan").val();
        $.ajax({
            url: "web/ambilprodi.php",
            data: "jurusan="+jurusan,
            cache: false,
            success: function(msg){
                $("#prodi").html(msg);
            }
        });
      });
    });
    </script>
</head>
<?php	
}
function menu(){
?>
    <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Selamat Datang</strong>
                             </span> <span class="text-muted text-xs block"><?= $_SESSION['nama_lengkap']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="ubah-password.html">Ubah Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            REPOT
                        </div>
                    </li>
                    <?php if($_SESSION['level'] == 'Administrator'){ ?>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Data Pendukung AIPT</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="admin.html">Beranda</a>
                        </li>
                        <li>
                            <a href="prestasi-dosen.html">Prestasi Dosen</a>
                        </li>
                        <li>
                            <a href="prestasi-mahasiswa.html">Prestasi Mahasiswa</a>
                        </li>
                        <li>
                            <a href="karya-ilmiah.html">Karya Ilmiah</a>
                        </li>
                        <li>
                            <a href="haki.html">Haki / Paten</a>
                        </li>
                        <li>
                            <a href="penelitian.html">Penelitian</a>
                        </li>
                        <li>
                            <a href="pengabdian.html">Pengabdian</a>
                        </li>
                        <li>
                            <a href="kerja-sama.html">Kerja Sama</a>
                        </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">File Dokumen Utama</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="rencana-strategis.html">Rencana Strategis</a>
                        </li>
                        <li>
                            <a href="rencana-operasional.html">Rencana Operasional</a>
                        </li>
                        <li>
                            <a href="sop.html">SOP</a>
                        </li>
                        <li>
                            <a href="envisioning.html">Envisioning</a>
                        </li>
                        <li>
                            <a href="emi.html">EMI</a>
                        </li>
                        <li>
                            <a href="tracer-study.html">Tracer Study</a>
                        </li>
                        <li>
                            <a href="pengembangan-sdm.html">Pengembangan SDM</a>
                        </li>
                        <li>
                            <a href="akreditasi-prodi.html">Akreditasi Prodi</a>
                        </li>
                        <li>
                            <a href="kurikulum.html">Kurikulum</a>
                        </li>
                        <li>
                            <a href="pedoman-akademik.html">Pedoman Akademik</a>
                        </li>
                        <li>
                            <a href="surat-keputusan.html">Surat Keputusan</a>
                        </li>
                        </ul>
                    </li>                                       
                    <li>
                        <a href="pengelola.html"><i class="fa fa-th-large"></i> <span class="nav-label">Pengelola</span></a>
                    </li>                 
                    <?php } else { ?>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Data Pendukung AIPT</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="admin.html">Beranda</a>
                        </li>
                        <li>
                            <a href="prestasi-dosen.html">Prestasi Dosen</a>
                        </li>
                        <li>
                            <a href="prestasi-mahasiswa.html">Prestasi Mahasiswa</a>
                        </li>
                        <li>
                            <a href="karya-ilmiah.html">Karya Ilmiah</a>
                        </li>
                        <li>
                            <a href="haki.html">Haki / Paten</a>
                        </li>
                        <li>
                            <a href="penelitian.html">Penelitian</a>
                        </li>
                        <li>
                            <a href="pengabdian.html">Pengabdian</a>
                        </li>
                        <li>
                            <a href="kerja-sama.html">Kerja Sama</a>
                        </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">File Dokumen Utama</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="rencana-strategis.html">Rencana Strategis</a>
                        </li>
                        <li>
                            <a href="rencana-operasional.html">Rencana Operasional</a>
                        </li>
                        <li>
                            <a href="sop.html">SOP</a>
                        </li>
                        <li>
                            <a href="envisioning.html">Envisioning</a>
                        </li>
                        <li>
                            <a href="emi.html">EMI</a>
                        </li>
                        <li>
                            <a href="tracer-study.html">Tracer Study</a>
                        </li>
                        <li>
                            <a href="pengembangan-sdm.html">Pengembangan SDM</a>
                        </li>
                        <li>
                            <a href="akreditasi-prodi.html">Akreditasi Prodi</a>
                        </li>
                        <li>
                            <a href="kurikulum.html">Kurikulum</a>
                        </li>
                        <li>
                            <a href="pedoman-akademik.html">Pedoman Akademik</a>
                        </li>
                        <li>
                            <a href="surat-keputusan.html">Surat Keputusan</a>
                        </li>
                        </ul>
                    </li>                    
                    <?php } ?>
                </ul>
</div>
<?php }
function top(){
?>
<div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><strong>Repository Fakultas Teknik UNG</strong></span>
                </li>
                <?php
				if($_SESSION['level'] == 'Administrator'){
				
				} else if ($_SESSION['level'] == 'PT'){
					$c = mysqli_query($con,"SELECT * FROM ajukan_pt ORDER BY id_pt DESC");
					while($pt = mysqli_fetch_array($c)){
						  $pp = mysqli_num_rows(mysqli_query($con,"SELECT * FROM catatan WHERE kode = '$pt[kode]' AND status = 0"));
						  $jum_pesan += $pp;
						  $kod = $pt[kode];
					}
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"><?= $jum_pesan; ?></span>
                    </a>
                    <?php 
						  $cc = mysqli_query($con,"SELECT * FROM catatan WHERE kode = '$kod' AND status = 0");
						  while($p = mysqli_fetch_array($cc)){
					?>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="ajukan-akreditasi-pt-<?= $p[kode]; ?>.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Ada <?= $jum_pesan; ?> Catatan Pada Daftar Pengajuan
                                    <span class="pull-right text-muted small"><?= waktu_lalu($p[tanggal]); ?></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                <?php
				} else { 
					$c = mysqli_query($con,"SELECT * FROM ajukan_prodi WHERE prodi = '$_SESSION[level]' ORDER BY id_ajukan_prodi DESC"); 
					while($pt = mysqli_fetch_array($c)){
						  $pp = mysqli_num_rows(mysqli_query($con,"SELECT * FROM catatan WHERE kode = '$pt[kode]' AND status = 0"));
						  $jum_pesan += $pp;
						  $kod = $pt[kode];
					}				
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"><?= $jum_pesan; ?></span>
                    </a>
                    <?php 
					$cc = mysqli_query($con,"SELECT * FROM catatan WHERE kode = '$kod' AND status = 0");
					while($p = mysqli_fetch_array($cc)){
					?>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="ajukan-akreditasi-prodi-<?= $p[kode]; ?>.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Ada <?= $jum_pesan; ?> Catatan Pada Daftar Pengajuan
                                    <span class="pull-right text-muted small"><?= waktu_lalu($p[tanggal]); ?></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <?php } ?>
                </li>				
				<?php
				}
				?>
                <li>
                    <a href="logout.html">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
</div>
<?php 
}
function js(){
?>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>
    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>
    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>		
<?php } 
function js2(){
?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>
    <!-- CodeMirror -->
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
    </script>    
<?php } 
function js3(){
?>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>     
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="js/plugins/dropzone/dropzone.js"></script>
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.footable').footable();
            $('.footable2').footable();
        });
    </script>
<?php } 
function js4(){
?>
    <!-- Mainly scripts -->
	<script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- Page-Level Scripts -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
	<script>
        $(document).ready(function() {
            $('.footable').footable();
            $('.footable2').footable();
			$('.chosen-select').chosen({width: "100%"});
        });
    </script>
    <script>
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    </script>
<?php } ?>