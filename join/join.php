<?php
$location = $_SERVER["HTTP_REFERER"];
if(isset($_GET['location'])) $location = $_GET['location'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>회원가입</title>
</head>

<body>
  <form action="joinOk.php" name="joinForm" method="post">
    <table>
      <tr>
        <td>아이디</td>
        <td><input type="text" name="id" /></td>
      </tr>
      <tr>
        <td>비밀번호</td>
        <td><input type="password" name="passwd" /></td>
      </tr>
      <tr>
        <td>비밀번호 확인</td>
        <td><input type="password" name="passwdCheck" /></td>
      </tr>
      <tr>
        <td>이름</td>
        <td><input type="text" name="name" /></td>
      </tr>
      
      <tr>
        <td><input type="submit" value="회원가입"></td>
        <input type="hidden" name="location" value="<?=$location ?>"/>
      </tr>
    </table>
  </form>
</body>

</html>