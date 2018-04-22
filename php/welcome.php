<?php
session_start();
if(!session_is_registered("username")) {
header("location:Login_Register.php")
?>
<?php
echo "Welcome " . $_SESSION['username'];
}?>