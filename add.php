<!DOCTYPE html>
<html>
    <head>
        <title>ADD BOOK</title>
        <meta charset="UTF-8">
        <style type="text/css">
            .title {
                background-color: fuchsia;
                height: 50px;
                width: 100px;
            }
            #add {
                background-color: brown;
                color: gold;
            }
            #submit {
                width: 120px;
                height: 40px;
                border: 3px solid blue;
                background-color: yellow;
            }
            #submit:hover {
                font-weight: bold;
                text-shadow: red 0px 2px 6px;
            }
            table {
                position: relative;
                top: 40px;
                background-color: white;
            }
            .thongbao {
                color: red;
                position: relative;
                top: 50px;
            }
            #quaylai {
                position: relative;
                top: 50px;
            }
            body {
                background-image: url("hinhnen.jpg");
                background-size: 300px;
                background-repeat: round;
            }
        </style>
    </head>
    <body>
        <form method="post">
            <table border="2" align="center" width="500" height="400">
                <tr>
                    <th id="add" colspan="2"><h1>ADD BOOK</h1></th>
                </tr>
                <tr>
                    <th class="title">Title</th>
                    <td align="center"><input name="title" size="40" type="text"></td>
                </tr>
                <tr>
                    <th class="title">Author</th>
                    <td align="center"><input name="author" size="40" type="text"></td>
                </tr>
                <tr>
                    <th class="title">Year</th>
                    <td align="center"><input name="year" size="40" type="text"></td>
                </tr>
                <tr>
                    <th class="title">Price</th>
                    <td align="center"><input name="price" size="40" type="text"></td>
                </tr>
                <tr>
                    <th colspan="2"><input id="submit" type="submit" value="SUBMIT" name="add"></th>
                </tr>
            </table>
        </form>
        <?php
            require_once 'connection.php';
            if(isset($_POST['add'])){
                $title = $_POST['title'];
                $author = $_POST['author'];
                $year = $_POST['year'];
                $price = $_POST['price'];
                if($title=="" || $author=="" || $year=="" || $price==""){
                    echo "<center><h2 class='thongbao'>Bạn chưa nhập đủ thông tin của sách</h2></center>";
                }else if (!is_numeric($year) || $year<1000 || $year>2017){
                    echo "<center><h2 class='thongbao'>year bạn nhập không hợp lệ: year phải trong khoảng từ 1000 đến 2017</h2></center>";
                } else if(!is_numeric($price)){
                    echo "<center><h2 class='thongbao'>price bạn nhập không hợp lệ</h2></center>";
                } else {
                    $sql = "INSERT INTO books(title, author, year, price)
                            VALUES('$title', '$author', '$year', '$price')";
                    mysqli_query($conn, $sql);
                    echo "<center><h2 class='thongbao'>Bạn đã thêm sách thành công</h2></center>";
                    echo "<center><a id='quaylai' href='listsach.php'>Quay lại trang sách</a></center>";
                }
            }
        ?>
    </body>
</html>