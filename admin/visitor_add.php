<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php
if(isset($_POST['visitor_add']) && $_POST['visitor_add'] == "mMUh9mKhJqPs19aE8JYT") {
    if( empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["cin"]) || empty($_POST["service"]) ) {
        ft_putmsg('danger','All fields are required.','/'.$_SESSION['role'].'/visitor_add.php');
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
        ft_putmsg('success','تمت إضافة الزائر الجديد بنجاح','/'.$_SESSION['role'].'/visitor_add.php');
    }
}
?>

<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">أضف زائر</h6>
					<form method="POST" action="">
				        <div class="media text-muted pt-3">
							<div class="form-row">
                                <div class="form-group col-md-3">
			                	    <label>بطاقة التعريف الوطنية</label>
				                    <input class="form-control" type="text" name="cin" required>
				                </div>
				                <div class="form-group col-md-3">
			                	    <label>الاسم الشخصي</label>
				                    <input class="form-control" type="text" name="fname" >
				                </div>
				                <div class="form-group col-md-3">
			                	    <label>الاسم العائلي</label>
				                    <input class="form-control" type="text" name="lname" >
				                </div>
                                <div class="form-group col-md-3">
			                	    <label>القسم او المصلحة</label>
				                    <select class="form-control" name="service" >
                                        <option  value="" >اختر القسم او المصلحة</option>
                                        <option  value="SG" >SG</option>
                                        <option  value="DAI" >DAI</option>
                                        <option  value="DRHMG" >DRHMG</option>
                                        <option  value="DAS" >DAS</option>
                                        <option  value="DCL" >DCL</option>
                                        <option  value="DAR" >DAR</option>
                                        <option  value="DBM" >DBM</option>
                                        <option  value="DAE" >DAE</option>
                                        <option  value="DUE" >DUE</option>
                                        <option  value="DE" >DE</option>
                                        <option  value="PN" >PN</option>
                                        <option  value="SSIC" >SSIC</option>
                                        <option  value="AI" >Audit Interne</option>
									</select>
				                </div>
				                <div class="form-group col-md-6">
			                	    <label>العنوان</label>
                                    <textarea class="form-control" name="address"></textarea>
				                </div>
                                
                                <div class="form-group col-md-6">
			                	    <label>موضوع الزيارة</label>
                                    <textarea class="form-control" name="subject"></textarea>
				                </div>
				            </div>
				        </div>						
				        <button name="visitor_add" type="submit" value="mMUh9mKhJqPs19aE8JYT" class="btn btn-primary">أضف زائر</button>
			        </form>
			    </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); ?>