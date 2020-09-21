<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php
    if(isset($_GET['visitor_id'])) {
        $sql = "DELETE FROM `visitor` WHERE `visitor_id`=".$_GET['visitor_id'];
        $sql = $db->prepare($sql);
        $sql->execute();
        ft_putmsg('success','تمت إزالة الزائر بنجاح','/'.$_SESSION['role'].'/visitor_list.php');
    }
?>