<?php
$getId = 1;
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
  <link rel="stylesheet" href="css/style.css">
  <title>쇼핑몰 만들기</title>
</head>
<body>
  <script type="text/javascript">
    function changeCount(num){
      var cou = document.getElementById('count');
      var res = parseInt(cou.value) + num;
      if(res<0) res = 0;
      // 재고보다 많이 주문할 경우 처리하는 기능 나중에 넣자..
      cou.value = res;
      viewPreBox();
    }

    function viewPreBox(){
      document.getElementById("preBox").style.display = 'block';

      document.getElementById("asdf")
    }

  </script>
<!-- 상단 메뉴 -->
  <div class="topMenu">
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
    <div id="searchBar"><input type="search" name="search" val=""></div>
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
      <div id="goodImage"><img src = "<?php echo $row['mainImg']; ?>" width=300px height="300px"></div>
        <table name="previewForm">
          <caption><?php echo $row['title']; ?></caption>
          <tr><td id="attri">판매가</td><td><?php echo $row['price']?>원</td></tr>
          <tr><td id="attri">배송비</td><td><?php echo $row['deliveryFee']?>원</td></tr>
          <tr><td id="attri">수량</td>
            <td><button onclick="changeCount(-1)">-</button></td>
            <td><input type="text" value="0"  id="count" ></td>
            <td><button onclick="changeCount( 1)">+</button></td>
          </tr>
        </table>
        <div id="preBox">
          <p><?php echo$row['title']?></p>
          <div id="asdf"></div>
        </div>
        <div>
        <button>장바구니 담기</button><button>구매하기</button>
      </div>
    </div>
    <div id = "detail">
      <h2>상세정보</h2>
      <?php echo $row['spec'] ?>

    </div>
  </div>
</body>
</html>
