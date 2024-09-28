<?php 
require_once('../config/menu.php');
require_once('../../config/koneksi.php');
require_once('../config/fungsi_indotgl.php');
?>
<!DOCTYPE html>
<html>
<?php echo head(); ?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        <?php echo menu(); ?>    
        </nav>
        <?php echo top(); ?>
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">
            <h2>FAKULTAS TEKNIK REPOSITORY</h2>
            <h3>Universitas Negeri Gorontalo</h3>
            </div>
        </div>
        <div class="row">
            <img src="img/banner.png" style="width:70%;">
        </div>

        </div>
    </div>
    <?php echo js(); ?>
</body>
</html>