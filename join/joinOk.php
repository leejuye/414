<?php
$id = $_POST['id'];
$pw = $_POST['passwd'];
$name = $_POST['name'];
$location = $_POST['location'];

$connect = mysqli_connect ("localhost", "root", "pass618", "inu");
 
$sql="INSERT into t_user (userId, userPw, userName, regDate) values ('$id', '$pw', '$name', now())";


$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

echo "<script>location.href = '$location'</script>";

// if($row = mysqli_fetch_array($result)){
//     if($row['userPw'] === $getPw){
//         session_start();
//         $_SESSION['userId'] = $getId;
//         $location = $_POST["location"];
//         echo "<script>location.href = '$location';</script>";
//     }
//     else{
//         echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
//     }
// }
// else{
//     echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
// }


