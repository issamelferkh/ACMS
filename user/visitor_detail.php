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

<!-- php show profile selected -->
<?php
	$query = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
	$query = $db->prepare($query);
	$query->execute();
	$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
?>
<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">التفاصيل زائر</h6>
					<form method="POST" action="">
				        <div class="media text-muted pt-3">
							<div class="form-row">
                                <div class="form-group col-md-3">
			                	    <label>بطاقة التعريف الوطنية</label>
				                    <input class="form-control" type="text" name="cin" >
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
                                    <input class="form-control" name="service" >                                      
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
				        <button name="visitor_update" value="mMUh9mKhJqPs19aE8JYT" type="submit" class="btn btn-primary">تعديل زائر</button>
                        <button name="visitor_update" value="mMUh9mKhJqPs19aE8JYT" type="submit" class="btn btn-primary">إزالة زائر</button>
			        </form>
			    </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); ?>