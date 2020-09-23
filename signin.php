<?php session_start(); ?>
<?php
require_once("config/connection.php");
require_once("include/libft.php");

if(isset($_POST["signin"])) {
    if(empty($_POST["username"]) || empty($_POST["password"])) {
        ft_putmsg('dark','All fields are required!','/signin.php');
    }
    else {     
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM user WHERE username="'.$username.'" AND password="'.$password.'"';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            $_SESSION['user_id']=$la_case[0]['user_id'];
            $_SESSION['username']=$la_case[0]['username']; // to check session
            // $_SESSION['fname']=$la_case[0]['fname'];
            // $_SESSION['lname']=$la_case[0]['lname'];
            // $_SESSION['email']=$la_case[0]['email'];
            $_SESSION['token']=hash('whirlpool', (rand(0,1000))); // needed to avoid CSRF
            // $_SESSION['auth'] = $la_case[0];

            $_SESSION['role']=$la_case[0]['role'];
            ft_putmsg('info','Welcome.','/'.$_SESSION['role'].'/index.php');
        } else {
            echo $username.$password;
            ft_putmsg('danger','Incorrect Username or Password!','/signin.php');
        }
    }
} 
?>

<?php include('include/header.php'); ?>
<?php include("include/navbar.php"); ?>
<?php if (isset($_SESSION['username']))  { header("location:user/index.php");} ?>  
<main role="main" class="container">
    <?php include("include/title.php"); ?>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">تسجيل الدخول</h6></br>
        <form method="post" action="signin.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="اسم المستخدم" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="password" name="password" placeholder="كلمة المرور" required>
                </div>
            </div>
            
            <button name="signin" type="submit" class="btn btn-primary">تسجيل الدخول</button>
        </form>
    </div>
</main>
<?php include 'include/footer.php'; ?>