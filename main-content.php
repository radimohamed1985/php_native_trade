<?php

if(isset($_SESSION['user'])){
    header('location:manage.php');
}
?>
<title><?php echo pagetitle(); ?></title>
<br><br><br><br><br><br><br><br><br>
<div class="container text-center">
    <center>
<!-- manage.php?do=manage -->
<h4>برنامج الفواتير و المخازن </h4>
<br>
<form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" style="direction: rtl;">
<table>
<tr>
    <td>اسم المستخدم</td>
    <td><input type="text" name="name" class="form-control"></td>
</tr>
<tr>
    <td>كلمة السر</td>
    <td><input type="password" name="password" id="" class="form-control"> </td>
</tr>
<tr>
    <td colspan="2"><input type="submit" name="submit" class="form-control btn btn-primary" value="تسجيل الدخول"></td>
</tr>
</table>
</form>
</center>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['name'];
    $password = $_POST['password'];
    check($username,$password);

}


