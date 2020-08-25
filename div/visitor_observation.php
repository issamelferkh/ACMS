<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>   
<?php include("../include/title.php"); ?>

<?php
if(isset($_POST['obs_add'])){
	if(empty($_POST['obs_content'])){
		ft_putmsg('danger','رجاءا اكمل جميع الحقول.','/'.$_SESSION['role'].'/visitor_observation.php');
	}else{
		$visitor_id = htmlspecialchars(trim($_POST["visitor_id"]));
		$user_id = htmlspecialchars(trim($_POST["user_id"]));
		$obs_content = htmlspecialchars(trim($_POST["obs_content"]));
		$username = htmlspecialchars(trim($_POST["username"]));

		$query = 'INSERT INTO `observation` (`visitor_id`,`user_id`,`obs_content`,`username`) VALUES (?,?,?,?)';
        $query = $db->prepare($query);
        $query->execute([$visitor_id, $user_id, $obs_content, $username]);
        ft_putmsg('success','تمت إضافة الملاحضة بنجاح','/'.$_SESSION['role'].'/visitor_detail.php?visitor_id='.$_POST["visitor_id"].'');
	}
}
?>

<main role="main" class="container">    
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">إظافة ملاحضة</h6>
					<form method="POST" action="">
						<input type="hidden" name="visitor_id" value="<?= $_GET['visitor_id'];?>">
						<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'];?>">
						<input type="hidden" name="username" value="<?= $_SESSION['username'];?>">


						<div class="media text-muted pt-3">
							<div class="form-row">
							
								<div class="form-group col-md-12">
									<label>إظافة ملاحضة حول الزائر</label>
									<textarea class="form-control" name="obs_content" row="10" cols="1000" ></textarea>
								</div>
							</div>
						</div>						
						<button name="obs_add" type="submit" class="btn btn-primary">تأكيد</button>
					</form>				
			    </div>
            </div>
			
        </div>
    </div>
</main>
<?php include("../include/footer.php"); 