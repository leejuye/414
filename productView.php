<?php
session_start();
$userId = "";
if(isset($_SESSION['userId'])) $userId = $_SESSION['userId'];

$getId = $_GET['uid'];
$currentURI = $_SERVER['REQUEST_URI'];


$connect = mysqli_connect ("localhost", "root", "pass618", "inu");

$sql="SELECT * FROM t_goods WHERE uid = $getId";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

$row = mysqli_fetch_array($result);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>쇼핑몰 만들기</title>
</head>
<body>
  <script type="text/javascript">

    function changeCount(num){
      var cou = document.getElementById('count');
      var res = parseInt(cou.value) + num;
      if(res<1) res = 1;
      cou.value = res;
      viewPreBox(res);
    }

    function viewPreBox(res){
      document.getElementById("preBox").style.display = 'block';
      document.getElementById("preview").style.height = '400px';
      document.getElementById("cou").value = res;
      var perPiece = <?= $row['price']?>;
      document.getElementById("pri").value = res*perPiece;
    }

    function doLogin(){
      location.href='./login/login.php?location='+document.location.href;
    }

    function check() {

      var f = document.Frm;

      if(f.userId.value == "") {
        alert("로그인이 필요합니다.");
        location.href = "./login/login.php?location=<?=$currentURI?>";
        return false;
      }
      else if(f.ea.value == "0") {
        alert("수량을 선택하세요.");
        return false;
      }

    }
  </script>
<!-- 상단 메뉴 -->
  <div class="topMenu">
  <ul>
    <?php if ($userId != null){?>
      <li><div id='welcome'><?=$userId?></div></li>
    <?php if ($userId ==='admin')
        echo "<li><a href = './productReg.php'><div id = 'add'>제품 추가하기<div></a></li>";} else{?>
      <li><a href="./login/login.php"><div id='login'>로그인</div></a></li>
      <li><a href="./join/join.php">회원가입</a></li>
      <?php }?>
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

  <!-- 제품 상세보기 -->
  <div class="cont">
    <div id="preview">
      <div id="goodImage"><img src = "<?=$row['mainImg']; ?>" width=300px height="300px"></div>
        <form name="Frm" action="./addCart.php" method="post" onsubmit="return check()">
        <input type="hidden" name="goodId" value=<?=$getId?>>
        <table>
          <caption><?=$row['title']; ?></caption>
          <tr><td id="attri">판매가</td><td><?=$row['price']?>원</td></tr>
          <tr><td id="attri">배송비</td><td><?=$row['deliveryFee']?>원</td></tr>
          <tr><td id="attri">수량</td>
            <td><a href="#" onclick="changeCount(-1)">-</a></td>
            <td><input type="text" value="0" id="count" ></td>
            <td><a href="#" onclick="changeCount( 1)">+</a></td>
          </tr>
        </table>
          <div id="preBox">
            <p ><?=$row['title']?></p>
            <div id="box1">수량: <input type="text" name="ea" value="0" id="cou">개</div>
            <div id="box2">최종결정금액: <input type="text" value="" id="pri">원</div>
          </div>
        <input type="submit" value="장바구니 담기"> <button>구매하기</button>
       </form>
    </div>
    <div id = "detail">

      <p>상세정보</p>

      <?=$row['spec'] ?>

    </div>
  </div>
</body>
</html>
