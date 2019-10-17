<?php
$getId = $_POST['id'];
$getPw = $_POST['passwd'];
$connect = mysqli_connect ("localhost", "root", "pass618", "inu");
 
$sql="SELECT * FROM t_user WHERE userId = '$getId'";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
 
if($row = mysqli_fetch_array($result)){
    if($row['userPw'] === $getPw){
        session_start();
        $_SESSION['userId'] = $getId;
        $location = $_POST["location"];
        echo "<script>location.href = '$location';</script>";
    }
    else{
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    }
}
else{
    echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
}


