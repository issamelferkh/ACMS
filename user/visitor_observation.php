<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php include("../include/header.php"); ?>   
<?php include("../include/navbar.php"); ?>   
<?php include("../include/title.php"); ?>









<main role="main" class="container">    
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">إظافة ملاحضة</h6>
					<div class="media text-muted pt-3">
						<div class="form-row">
						
							<div class="form-group col-md-6">
								<label>إظافة ملاحضة حول الزائر</label>
								<textarea class="form-control" name="subject" row="10" cols="100" ></textarea>"
							</div>
						</div>
					</div>						
					<a href="visitor_detail.php" class="btn btn-success" name="visitor_update"> تأكيد</a>
										
			    </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); 