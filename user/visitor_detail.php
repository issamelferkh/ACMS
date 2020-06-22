<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php
if(isset($_POST['visitor_add']) && $_POST['visitor_add'] == "mMUh9mKhJqPs19aE8JYT") {
    if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["cin"]) || empty($_POST["service"]) || empty($_POST["address"]) 
    || empty($_POST["subject"]) ) {
        ft_putmsg('danger','All fields are required.','/user/visitor_add.php');
    } else {
        $fname = htmlspecialchars(trim($_POST["fname"]));
        $lname = htmlspecialchars(trim($_POST["lname"]));
        $cin = htmlspecialchars(trim($_POST["cin"]));
        $service = htmlspecialchars(trim($_POST["service"]));
        $address = htmlspecialchars(trim($_POST["address"])); 
        $subject = htmlspecialchars(trim($_POST["subject"])); 

        $query = 'INSERT INTO `visitor` (`fname`,`lname`,`cin`, `service`, `address`, `subject`) VALUES (?,?,?,?,?,?)';
        $query = $db->prepare($query);
        $query->execute([$fname,$lname,$cin,$service,$address,$subject]);
        ft_putmsg('success','تمت إضافة الزائر الجديد بنجاح','/user/visitor_add.php');
    }
}
?>

<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
	<!-- start test -->
	<?php
		$sql  = "SELECT * FROM `visitor` WHERE visitor_id = ".$_GET['visitor_id'];
		$issam = $db->prepare($sql);
		$issam->execute();
		$count = $issam->rowCount();
		$la_case = $issam->fetchAll(\PDO::FETCH_ASSOC);
		$count > 0 ? $cin = $la_case[0]['cin'] : $cin = "لا يوجد";
		$count > 0 ? $fname = $la_case[0]['fname'] : $fname = "لا يوجد";
		$count > 0 ? $lname = $la_case[0]['lname'] : $lname = "لا يوجد";
		$count > 0 ? $service = $la_case[0]['service'] : $service = "لا يوجد";
		$count > 0 ? $address = $la_case[0]['address'] : $address = "لا يوجد";
		$count > 0 ? $subject = $la_case[0]['subject'] : $subject = "لا يوجد";

	?>
	<!-- end test -->

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
					<a href="" class="btn btn-primary">تعديل زائر</a>
			    </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); ?>