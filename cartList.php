<?php
session_start();
if(isset($_SESSION['userId'])) $userId = $_SESSION['userId'];
else echo "<script>location.href='./login/login.php';</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style2.css">
  <title>장바구니</title>
</head>
<body>
  <script>
      window.onload =function(){
    var userId = "<?= $userId?>"; 
    if(userId != null){
        document.getElementById('welcome').innerHTML=userId;
    }
    if(userId != 'admin'){
      document.getElementById("add").style.display='none';
    }
  }</script>
  <!-- 상단 메뉴 -->
    <div class="topMenu">
      <ul>
        <li><div id='welcome'></div></li>
        <li><a href = './productReg.php'><div id = 'add'>제품 추가하기<div></a></li>
        <li><a href="./login/login.php"><div id='login'>로그인</div></a></li>
        <li><a href="./join/join.php">회원가입</a></li>
        <li style="border:none;"><a href="cartList.php">장바구니</a></li>
      </ul>
    </div>
    <div class="LNB1">
      <div id="logo">쇼핑몰</div>
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

    <div class="cont">
      <p>Cart List</p>
      <table>
        <tr><th style="width: 625px">상품</th>
          <th>수량</th>
          <th>상품금액</th>
          <th>배송비</th></tr>

        <?php
          $connect = mysqli_connect ("localhost", "root", "pass618", "inu");;
          $sql="SELECT * FROM t_cart as c 
          join t_goods as g on g.uid = c.goodsUid
          where userId = '$userId'";
          $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

          
          while($row = mysqli_fetch_array($result)){
              $price = $row['price']*$row['ea'];
              if($price >= $row['deliveryLimit']) $delFee = 0;
              else $delFee = $row['deliveryFee'];
              echo '<tr style="height: 110px"><td style="text-align: left;"><img src="'.$row['mainImg'].'" width="100" height="100"</td> '.$row['title'].'</td>
              <td>'.$row['ea'].'</td>
              <td>'.$price.'</td>
              <td>'.$delFee.'</td></tr>';
          }

         ?>
       </div>
</table>
</body>
</html>
