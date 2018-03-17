<!DOCTYPE html>
<html>
    <head>
        <title>EDIT BOOK</title>
        <meta charset="UTF-8">
        <style type="text/css">
            #edit {
                background-color: deeppink;
                color: aliceblue;
            }
            .khoa {
                width: 100px;
                height: 50px;
                color: bisque;
                background-color: darkolivegreen;
            }
            #submit {
                height: 50px;
                width: 120px;
                border: 3px solid buttonhighlight;
                background-color: burlywood;
            }
            #submit:hover {
                background-color: hotpink;
                font-weight: bold;
            }
            #submit:active {
                background-color: blue;
            }
            .thongtin {
                color: red;
            }
            body {
                background-image: url("hinhnen.jpg");
                background-size: 300px;
                background-repeat: round;
            }
            table {
                background: white;
            }
        </style>
    </head>
    <body>
        <?php require_once 'connection.php';
        $id = $_REQUEST["id"];
        $sql = mysqli_query($conn, "select * from books where id='$id'");
        $row = mysqli_fetch_array($sql);
        $titles = $row['title'];
        $authors = $row['author'];
        $years = $row['year'];
        $prices = $row['price'];
        if(isset($_POST["update"])){
            $title = $_POST["title"];
            $author = $_POST["author"];
            $year = $_POST["year"];
            $price = $_POST["price"];
            $id = $_REQUEST["id"];
            if ($title=="" || $author=="" || $year=="" || $price==""){
                echo "<center><h2 class='thongtin'>Bạn không được để trống thông tin</h2></center>";
            } else {
                $sql = "UPDATE books SET title='$title', author='$author',
                        year='$year', price='$price' WHERE id='$id'";
                if (!$conn->query($sql) === TRUE) {
                    echo "Record updated fail";
                } else{
                    header("Location: listsach.php");
                }
            }
        }
        ?>
        <form method="post">
            <table align="center" border="2" width="600" height="500">
                <tr>
                    <th id="edit" colspan="2"><h1>EDIT BOOK</h1></th>
                </tr>
                <tr>
                    <th class="khoa"><h3>Title</h3></th>
                    <td align="center"><input name="title" value="<?php echo $titles?>"  type="text" size="40"></td>
                </tr>
                <tr>
                    <th class="khoa"><h3>Author</h3></th>
                    <td align="center"><input name='author' value="<?php echo $authors?>" type="text" size="40"></td>
                </tr>
                <tr>
                    <th class="khoa"><h3>Year</h3></th>
                    <td align="center"><input name='year' value="<?php echo $years?>" type="text" size="40"></td>
                </tr>
                <tr>
                    <th class="khoa"><h3>Price</h3></th>
                    <td align="center"><input name='price' value="<?php echo $prices?>" type="text" size="40"></td>
                </tr>
                <tr>
                    <th colspan="2"><input id="submit" type="submit" value="UPDATE" name="update"></th>
                </tr>
            </table>
        </form>
    </body>
</html>