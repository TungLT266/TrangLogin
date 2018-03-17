<!DOCTYPE html>
<?php  session_start(); ?>
<html>
    <head>
        <title>LIST BOOK</title>
        <meta charset="UTF-8">
        <style type="text/css">
            .edit {
                background-color: aqua;
                display: block;
                width: 45px;
                line-height: 30px;
                float: left;
                text-decoration: none
            }
            .edit:hover {
                border: 2px solid blue;
                font-weight: bold;
            }
            .edit:active {
                background-color: yellow;
            }
            .del:active {
                background-color: yellow;
            }
            .del {
                background-color: aqua;
                display: block;
                width: 45px;
                line-height: 30px;
                float: right;
                text-decoration: none
            }
            .del:hover {
                border: 2px solid red;
                font-weight: bold;
            }
            #add {
                border: 3px solid blue;
                color: red;
                font-weight: bold;
                display: block;
                width: 100px;
                line-height: 40px;
                text-decoration: none;
/*                position: relative;
                right: 50px;
                top: 15px;*/
            }
            #add:hover {
                background: #eee;
            }
            #list {
                background-color: darkcyan;
                color: chartreuse;
            }
            table {
                border: 10px solid background;
                position: relative;
                top: 10px;
                background-color: #FFFFFF;
            }
            #hhh {
/*                float: left;
                position: relative;
                left: 80px;*/
            }
            #total {
                line-height: 30px;
                width: 100px;
            }
            body {
                background-image: url("hinhnen.jpg");
                background-size: 300px;
                background-repeat: round;
            }
        </style>
    </head>
    <body>
        <?php require_once 'connection.php'; ?>
        <table width="1000" border="2" cellpadding="5" align="center">
            <tr id="list">
                <th colspan="7"><h1>LIST BOOK</h1></th>
            </tr>
            <tr bgcolor="#CC3300" style="color:#FFFFFF">
                <th>#</th>
                <th><h3>ID</h3></th>
                <th><h3>Title</h3></th>
                <th><h3>Author</h3></th>
                <th><h3>Year</h3></th>
                <th><h3>Price</h3></th>
                <th width="110"><h3>Action</h3></th>
            </tr>
            <?php
                $total = 0;
                $sql = mysqli_query($conn, "select * from books order by title asc");
                while($row = mysqli_fetch_array($sql)){
                    $total += $row['price'];
            ?>
                    <tr height="50">
                        <th><input type="checkbox" value="1" id="<?php echo $row['id'] ?>"></th>
                        <td align="center"><?php echo $row['id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['author'] ?></td>
                        <td align="right"><?php echo $row['year'] ?></td>
                        <td align="right"><?php echo $row['price'] ?></td>
                        <td>
                            <a align="center" class="edit" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <a class="del" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    
                <?php } ?>
            <tr>
                <td colspan="5" align="center">
                    <h3 id="hhh">Total Price</h3>
                </td>
                <td align="right" width="110">
                    <input value="<?php echo $total ?>" id="total" type="text">
                </td>
                <td colspan="2" align="center">
                    <a align="center" id="add" href="add.php">ADD BOOK</a>
                </td>
            </tr>
        </table>
    </body>
</html>