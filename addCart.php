<?php
session_start();
if(isset($_SESSION['userId'])) $userId = $_SESSION['userId'];
$getGoodId = $_POST['goodId'];
$ea = $_POST['ea'];
$connect = mysqli_connect ("localhost", "root", "pass618", "inu");

$check = "SELECT * from t_cart where userId ='$userId' AND goodsUId = '$getGoodId'";
$result = mysqli_query($connect, $check) or die(mysqli_error($connect));
if($row = mysqli_fetch_array($result)){
    $setEa = $row['ea']+$ea;
    $sql = "UPDATE t_cart SET ea = '$setEa', regDate = now() where userId ='$userId' AND goodsUId = '$getGoodId'";
}
else $sql="INSERT INTO t_cart (userId, goodsUid, ea,regDate) VALUES('$userId', '$getGoodId', '$ea', now())";
$result2 = mysqli_query($connect, $sql) or die(mysqli_error($connect));
echo "<script>location.href = './cartList.php';</script>";
?>
