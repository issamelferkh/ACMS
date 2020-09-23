<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>

<?php 
	if(isset($_POST['visitor_update'])){
		$query = "UPDATE `visitor` SET `fname`=?,`lname`=?,`cin`=?,`address`=?,`service`=?,`subject`=? WHERE `visitor`.`visitor_id` = ?";
        $query = $db->prepare($query);
        $query->execute([$_POST['fname'],$_POST['lname'],$_POST['cin'],$_POST['address'],$_POST['service'],$_POST['subject'],$_POST['visitor_id']]);
		ft_putmsg('success','تم تعديل الزائر بنجاح','/'.$_SESSION['role'].'/visitor_list.php');
	}
?>


<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?> 

<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
	
	<?php
		$sql  = "SELECT * FROM `visitor` WHERE visitor_id = ".$_GET['visitor_id'];
		$issam = $db->prepare($sql);
		$issam->execute();
		$count = $issam->rowCount();
		$la_case = $issam->fetchAll(\PDO::FETCH_ASSOC);
		$count > 0 ? $visitor_id = $la_case[0]['visitor_id'] : $visitor_id=0;
		$count > 0 ? $cin = $la_case[0]['cin'] : $cin = "لا يوجد";
		$count > 0 ? $fname = $la_case[0]['fname'] : $fname = "لا يوجد";
		$count > 0 ? $lname = $la_case[0]['lname'] : $lname = "لا يوجد";
		$count > 0 ? $service = $la_case[0]['service'] : $service = "لا يوجد";
		$count > 0 ? $address = $la_case[0]['address'] : $address = "لا يوجد";
		$count > 0 ? $subject = $la_case[0]['subject'] : $subject = "لا يوجد";

	?>    
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">تفاصيل الزائر</h6>
					<form method="POST" action="visitor_update.php">
					<input type="hidden" name="visitor_id" value="<?= $_GET['visitor_id'];?>">
					<div class="media text-muted pt-3">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>بطاقة التعريف الوطنية</label>
								<input class="form-control" type="text" name="cin" value="<?= $cin; ?>">
							</div>
							<div class="form-group col-md-3">
								<label>الاسم الشخصي</label>
								<input class="form-control" type="text" name="fname" value="<?= $fname; ?>">
							</div>
							<div class="form-group col-md-3">
								<label>الاسم العائلي</label>
								<input class="form-control" type="text" name="lname" value="<?= $lname; ?>">
							</div>
							<div class="form-group col-md-3">
								<label>القسم او المصلحة</label>
								<input class="form-control" name="service" value="<?= $service; ?>">                                      
							</div>
							<div class="form-group col-md-6">
								<label>العنوان</label>
								<textarea class="form-control" name="address"><?= $address; ?></textarea>
							</div>
							
							<div class="form-group col-md-6">
								<label>موضوع الزيارة</label>
								<textarea class="form-control" name="subject"><?= $subject; ?></textarea>
							</div>
						</div>
					</div>
					<button name="visitor_update" type="submit" class="btn btn-primary">أضف زائر</button>
					</form>
			    </div>
            </div>
        </div>
    </div>
</main>

<?php include("../include/footer.php"); 