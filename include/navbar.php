<?php
if (isset($_SESSION['username']))  { ?>  
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/user/index.php">ACMS</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/<?= $_SESSION['role']; ?>/visitor_add.php">-أضف زائر-</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/<?= $_SESSION['role']; ?>/visitor_list.php">-عرض جميع الزوار-</a>
            </li>
        </ul>    
        <a href="<?php echo $url; ?>/signout.php?token=<?php echo $_SESSION['token']; ?>" class="btn btn-outline-danger my-2 my-sm-0" role="button">تسجيل الخروج</a>
    </div>
</nav>

<?php }
else { ?>
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $url; ?>/signin.php">ACMS  | نظام إدارة صلاحية الدخول</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <!-- <a class="nav-link" href="<?php echo $url; ?>/home.php">Home</a> -->
            </li>
        </ul>
    
        <a href="<?php echo $url; ?>/signin.php" class="btn btn-outline-primary my-2 my-sm-0" role="button">تسجيل الدخول</a>
    </div>
</nav>
<?php }
?>
