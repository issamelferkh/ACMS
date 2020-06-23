<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>   
<?php include("../include/title.php"); ?>
<?php 
	if(isset($_POST['visitor_update'])){
        $fname = htmlspecialchars(trim($_POST["fname"]));
        $lname = htmlspecialchars(trim($_POST["lname"]));
        $cin = htmlspecialchars(trim($_POST["cin"]));
        $service = htmlspecialchars(trim($_POST["service"]));
        $address = htmlspecialchars(trim($_POST["address"])); 
        $subject = htmlspecialchars(trim($_POST["subject"])); 

        $query = "UPDATE `visitor` SET (fname,lname,cin,service,adress,subject) VALUES(?,?,?,?,?,?) WHERE visitor_id= ".$_GET['visitor_id']."";
        $query = $db->prepare($query);
        $query->execute([$fname,$lname,$cin,$service,$address,$subject]);
        ft_putmsg('success','تم تعديل الزائر بنجاح','/user/visitor_update.php');
    
?>
<main role="main" class="container">    
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">تفاصيل الزائر</h6>
					<div class="media text-muted pt-3">
						<div class="form-row">
							<div class="form-group col-md-3">
							<?php 
								$sql = "SELECT * FROM `visitor` WHERE `id_visitor` like ".$_GET['id_visitor']."";
								$result = $db->query($sql);
								while($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo "

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
								<textarea class="form-control" name="address" ><?= $address; ?></textarea>
							</div>
							
							<div class="form-group col-md-6">
								<label>موضوع الزيارة</label>
								<textarea class="form-control" name="subject" ><?= $subject; ?></textarea>"
							</div>
						</div>
					</div>						
					<a href="visitor_detail.php" class="btn btn-success" name="visitor_update"> تعديل</a>
										
			    </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); 