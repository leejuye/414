<?php
 $location = $_SERVER["HTTP_REFERER"];
 if(isset($_GET['location'])) $location = $_GET['location'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>로그인</title>
</head>

<body>
  <form action="loginOk.php" name="loginForm" method="post">
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
        <td><input type="submit" value="로그인"></td>
        <input type="hidden" name="location" value="<?php echo $location ?>"/>
      </tr>
    </table>
  </form>
    <button onclick="location.href = '../join/join.php'">회원가입</button>
</body>

</html>
