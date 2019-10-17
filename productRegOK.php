<?php
	$connect = mysqli_connect ("localhost", "root", "pass618", "inu");

	$uploaddir = 'C:\Bitnami\wampstack-7.3.9-0\apache2\htdocs\414\img\\';
	$uploadfile = $uploaddir . basename($_FILES['image']['name']);
	echo '<pre>';
	if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
	} else {
		print "파일 업로드 공격의 가능성이 있습니다!\n";
	}
	echo '자세한 디버깅 정보입니다:';
	print_r($_FILES);
	print "</pre>";

	$img = './img/'.$_FILES['image']['name'];

	$name = $_POST['name'];
	$price = $_POST['price'];
	$spec = $_POST['spec'];
	$stock = $_POST['stock'];
	$deliveryFee = $_POST['deliveryFee'];
	$isSoldout = $_POST['isSoldout'];
	$date = date("Y-m-d H:i:s");

	if($name == ""){
	    echo "<script>alert('상품명을 입력해 주세요.');history.back();</script>";
	}
	if($price == ""){
		echo "<script>alert('상품가격을 입력해 주세요.');history.back();</script>";
	}
	if(!is_numeric($price)){
	    echo "<script>alert('상품가격을 숫자로 입력해 주세요.');history.back();</script>";
	}
	if($spec == ""){
	    echo "<script>alert('상품설명을 입력해 주세요.');history.back();</script>";
	}
	if($stock == ""){
	    echo "<script>alert('재고를 입력해 주세요.');history.back();</script>";
	}
	if(!is_numeric($deliveryFee) && $deliveryFee != ""){
	    echo "<script>alert('배송비를 숫자로 입력해 주세요.');history.back();</script>";
	}

	if ($name != "" && $price != "" && $spec != "" && $stock != ""){
		if ($deliveryFee == ""){
			$deliveryFee = "0";
		}

		if (isset($isSoldout)) {
			$isSoldout = "T";
		} else { $isSoldout = "F"; }
		if($deliveryFee != "" && $isSoldout != ""){
			$sql = "insert into t_goods (title,price,mainImg,spec,stock,deliveryMethod,deliveryFee,deliveryLimit,state,isSoldout,regDate) values('$name','$price','$img','$spec','$stock','택배','$deliveryFee','30000','O','$isSoldout','$date')";
			$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
			echo "<script>alert('상품등록이 완료되었습니다.');location.replace('main.php');</script>";
			
		}
	}
 ?>