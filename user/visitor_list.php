<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>
<?php include("../include/header.php"); ?>
<?php include("../include/navbar.php"); ?>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<main role="main" class="container">   
	<?php include("../include/title.php"); ?>  
    <div class="my-1 p-1 bg-white rounded box-shadow">
        <div class="content-wrapper">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="m-2">
                            <table id="example" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>CIN</th>
                                    <th>الاسم الشخصي</th>
                                    <th>الاسم العائلي</th>
                                    <th>القسم او المصلحة</th>
                                    <th>تاريخ الإضافة</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    $query1 = " SELECT * FROM `visitor` ";
    $query1 = $db->prepare($query1);
    $query1->execute();
    $count1 = $query1->rowCount();
    $la_case = $query1->fetchAll(\PDO::FETCH_ASSOC);
    $i = 0;
    while ($count1 > $i) {
            echo "
                                    <tr>
                                        <td>".$la_case[$i]['cin']."</td>
                                        <td>".$la_case[$i]['fname']."</td>
                                        <td>".$la_case[$i]['lname']."</td>
                                        <td>".$la_case[$i]['service']."</td>
                                        <td>".$la_case[$i]['created_at']."</td>
                                    </tr>
            ";
        $i++;
    }
?>      
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                    </tr>
                                </tfoot>
                            </table>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("../include/footer.php"); ?>