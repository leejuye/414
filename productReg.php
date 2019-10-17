<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>상품등록</title>
    <style>
        form {
            position: absolute;
            top: 0; left: 50px; bottom: 0; right: 50px;
            width: 410px; height: 500px;
            margin: 10% auto;
            border: 1px solid gray;
            background-color: skyblue;
            padding: 20px;
        }
        #box{
            border: 0.3px solid gray;
            width: 400px;
            height: 30px;
            font-size: 15px;
        }
        #imageInsert{
            border: 0.3px solid gray;
            background-color: white;
            width:320px;
        }
        textarea{
            border: 0.3px solid gray;
            width: 395px;
            height: 150px;
            font-size: 15px;
        }
        #checkbox {
            width: 15px;
            height: 15px;
        }
        #saveItem {
            margin-left: 5px;
            width: 400px;
            height: 30px;
            text-align: center;
        }
        #backMain{
            margin-left: 335px;
        }
    </style>
</head>
<body>
    <form name="productPost" method="post" action="productRegOK.php" enctype="multipart/form-data">
        <h2>상품등록</h2>
            <table>
                <tr>
                    <td><input id="box" type="text" size="35" name="name" placeholder="상품명입력"></td>
                </tr>
                <tr>
                    <td><input id="box" type="text" size="35" name="price" placeholder="상품가격"></td>
                </tr>
                <tr>
                    <td>상품이미지
                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> -->
                    <input id="imageInsert" type="file" name="image"></td>
                <tr>
                    <td><textarea name="spec" placeholder="상품상세설명"></textarea></td>
                </tr>
                <tr>
                    <td><input id="box" type="number" size="35" name="stock" placeholder="재고"></td>
                </tr>
                <tr>
                    <td><input id="box" type="text" size="35" name="deliveryFee" placeholder="배송비"></td>
                </tr>
                <tr>
                    <td><input id="checkbox" type="checkbox" name="isSoldout" value="품절">품절</td>
                </tr>
            </table>
            <input id="saveItem" type="submit" name="submit" value="상품등록">
            <input id="backMain" type="button" onClick="location.href='main.php'" value="뒤로가기">
    </form>
</body>
</html>