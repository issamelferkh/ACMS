<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php
// if(isset($_POST['visitor_add']) && $_POST['visitor_add'] == "mMUh9mKhJqPs19aE8JYT") {
//     if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["cin"]) || empty($_POST["service"]) || empty($_POST["address"]) 
//     || empty($_POST["subject"]) ) {
//         ft_putmsg('danger','All fields are required.','/'.$_SESSION['role'].'/visitor_add.php');
//     } else {
//         $fname = htmlspecialchars(trim($_POST["fname"]));
//         $lname = htmlspecialchars(trim($_POST["lname"]));
//         $cin = htmlspecialchars(trim($_POST["cin"]));
//         $service = htmlspecialchars(trim($_POST["service"]));
//         $address = htmlspecialchars(trim($_POST["address"])); 
//         $subject = htmlspecialchars(trim($_POST["subject"])); 

//         $query = 'INSERT INTO `visitor` (`fname`,`lname`,`cin`, `service`, `address`, `subject`) VALUES (?,?,?,?,?,?)';
//         $query = $db->prepare($query);
//         $query->execute([$fname,$lname,$cin,$service,$address,$subject]);
//         ft_putmsg('success','تمت إضافة الزائر الجديد بنجاح','/'.$_SESSION['role'].'/visitor_add.php');
//     }
// }
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
	<!-- start test -->
	<?php 
			// $sql = "SELECT * FROM `observation` WHERE `visitor_id` like ".$_GET['visitor_id']."";
			// $result = $db->query($sql);
			// $result->fetch();
			// while($row = $result) {
			// 	echo " 
				
			// 	<div class='form-group col-md-6'>
			// 		<label>إظافة ملاحضة حول الزائر</label>
			// 		<textarea class='form-control' name='observation' row='10' cols='100' ></textarea>
			//     </div>
			
			// ";
			// }
			?>

	<!-- end test -->
	<!-- delete visitor -->
	<!--end delete the visitor  -->

    
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
					<h6 class="border-bottom border-gray pb-2 mb-0">تفاصيل الزائر</h6>
					<div class="media text-muted pt-3">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>بطاقة التعريف الوطنية</label>
								<input class="form-control" type="text" name="cin" value="<?= $cin; ?>" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>الاسم الشخصي</label>
								<input class="form-control" type="text" name="fname" value="<?= $fname; ?>" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>الاسم العائلي</label>
								<input class="form-control" type="text" name="lname" value="<?= $lname; ?>" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>القسم او المصلحة</label>
								<input class="form-control" name="service" value="<?= $service; ?>" disabled>                                      
							</div>
							<div class="form-group col-md-6">
								<label>العنوان</label>
								<textarea class="form-control" name="address" disabled><?= $address; ?></textarea>
							</div>
							
							<div class="form-group col-md-6">
								<label>موضوع الزيارة</label>
								<textarea class="form-control" name="subject" disabled><?= $subject; ?></textarea>
							</div>
						</div>
					</div>						
					<a href="visitor_observation.php?visitor_id=<?= $visitor_id;?>" class="btn btn-success">إضافة ملاحظة</a>
					<a href="visitor_update.php?visitor_id=<?= $visitor_id;?>" class="btn btn-warning">تعديل زائر</a>
					<a href="visitor_delete.php?visitor_id=<?= $visitor_id;?>" name="visitor_delete" class="btn btn-danger" onclick="return deleteConfirmation()">إزالة زائر</a>	
				</div>
            </div>
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">إظافة ملاحضة</h6>
					<div class="media text-muted pt-3">
						<div class="form-row">
<?php
	$issam = "SELECT * FROM `observation` WHERE visitor_id = ".$_GET['visitor_id'];
	$issam = $db->prepare($issam);
	$issam->execute();
	$a = $issam->rowCount();
	$i = 0;
	$case = $issam->fetchAll(\PDO::FETCH_ASSOC);
	while ($i < $a) {
		echo "
			<div class='form-group col-md-12'>
				<p class='text-right'>".$case[$i]['username']." :ملاحضة من طرف</p>
				<p class='text-right'>".$case[$i]['created_at']." :بتاريخ</p>
				<textarea class='form-control' row='10' cols='1000' disabled>".$case[$i]['obs_content']."</textarea>
			</div>
		";
		$i++;
	}
		// $user_id = htmlspecialchars(trim($_POST[""]));
		// $obs_content = htmlspecialchars(trim($_POST[""]));
		// $username = htmlspecialchars(trim($_POST[""]));

?>
						</div>
					</div>						
			    </div>
            </div>
			
        </div>
    </div>
</main>
<script>
	function deleteConfirmation() {
		let res = confirm("wach bessaè baghi t delete");
		if (res == true) {
			console.log("Yes");
		} else {
			console.log("Nooo");
		}
		return res;
	}


</script>
<?php include("../include/footer.php"); ?>