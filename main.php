<?php
session_start();
$userId = null;
if(isset($_SESSION['userId'])) $userId = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>쇼핑몰</title>
  <style type="text/css">

  </style>
</head>
<body>
<script>
  window.onload =function(){
    var userId = "<?= $userId?>"; 
    if(userId != null){
      // document.getElementById("login").style.display = 'none';
      document.getElementById('welcome').innerHTML=userId;
    }
    // else{
    //   document.getElementById("logout").style.display = 'none';
    // }
    if(userId != 'admin'){
      document.getElementById("add").style.display='none';
    }
  }
</script>


<div class="topMenu">
    <ul>
      <li><div id='welcome'></div></li>
      <li><a href = './productReg.php'><div id = 'add'>제품 추가하기<div></a></li>
      <li><a href="./login/login.php"><div id='login'>로그인</div></a></li>
      <!-- <li><a href="#" onclick="removeId();"><div id='logout'>로그아웃</div></a></li> -->
      <li><a href="./join/join.php">회원가입</a></li>
      <li style="border:none;"><a href="cartList.php">장바구니</a></li>
    </ul>
  </div>
  <div class="LNB1">
    <a href = "/414/main.php"><div id="logo">쇼핑몰</div></a>
    <div id="searchTop">
      <ul>
        <li style="border:none;">인기검색어1</li>
        <li>인기검색어2</li>
        <li>인기검색어3</li>
        <li>인기검색어4</li>
      </ul>
    </div>
    <input id="searchBar" type="search" name="search" val="">

    <div id="promotionBanner">광고</div>
  </div>
  <div class="LNB2">
    <div id="category">
      <ul>
        <li>국내도서</li>
        <li>외국도서</li>
        <li>ebook</li>
        <li>웹소설</li>
        <li>기프트</li>

        <li>음반</li>
        <li>중고장터</li>
      </ul>
    </div>
  </div>
  <!-- 상단 메뉴 -->

  <!-- best Products -->
  <div class="cont">
    <h1>Best Products</h1>
    <table>
      <?php
        $connect = mysqli_connect ("localhost", "root", "pass618", "inu");

        $sql="select * from t_goods";
        $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
      
        $count = 0;
        while($row = mysqli_fetch_array($result)){
          if($count%4 == 0) echo "<tr>";
          echo "
            <td>
            <a href='./productView.php?uid=$row[0]'>
              <div id = 'prodect'>
                <div id = 'image'><img src = '$row[3]' width=200 height=200></div>
                <div id = 'title'>$row[1]</div>
                <div id = 'price'>$row[2]</div>
              </div>
            </a>
            </td>
          ";
          if($count%4 == 3) echo "</tr>";
          $count++;
        }
        if($count%4!=3) echo "</tr>";
        
      ?>
    </table> 
  </div>
</body>
</html>