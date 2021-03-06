<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "User") {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            margin: 0;
            background-color: #242833;
            color: #fdFcfa;
            height: 100vh;
           
        }

        ul.topnav {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            list-style-type: none;
            margin: 0px 5%;
            padding: 0;
            padding-top: 10px;
        }

        ul.topnav li a {
            display: block;
            color: white;
            font-size: 20px;
            text-align: center;
            padding: 14px 0;
            text-decoration: none;
        }

        .cart {
            width: 20px;
            margin-right: 10px;
            margin-top: 2px;
        }

        .search {
            background-color: #616872;

            border-radius: 10px;
            margin: 5px 16px;
        }

        ::placeholder {
            color: #fdFcfa;
            opacity: 1;

        }

        .search input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: none;
            color: #fdFcfa;
            border-radius: 10px 0 0 10px;
            background-color: #616872;
        }

        .search button {
            float: right;
            color: #fdFcfa;
            border-radius: 10px;
            padding: 10px 10px;
            background: #343b4c;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .log {
            text-align: center;
        }

        @media(min-width:1001px) {
            ul.topnav {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }





            #search {
                margin-left: auto;
                order: 1;
            }

            .log {
                order: 3;
            }

            #cart {
                order: 2;
            }

            .left {
                margin-right: 25px;
            }

            .right {
                margin-left: 25px;
            }

        }

        .dropbtn {
            background-color: transparent;
            color: white;
            font-size: 20px;
            padding: 16px 10px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #343b4c;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #616872;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #616872;
        }

        .title {
            margin: 30px;
        }

        .box1 table img {

            height: 80px;
        }

        .box1 table,
        .box1 th,
        .box1 td {
            padding: 5px;
            border: 1px solid #fdFcfa;
            border-collapse: collapse;

        }

        .box1 table {
            text-align: center;
            width: 100%;
            border-radius: 15px;
            border-style: hidden;
            /* hide standard table (collapsed) border */
            box-shadow: 0 0 0 1px #fdFcfa;
            /* this draws the table border  */

        }

        .container {
            margin: 40px 5%;
            display: flex;

            align-items: flex-start;
        }

        .box1 {
            flex-basis: 70%;
            padding-right: 40px;
        }

        .box2 {
            flex-basis: 30%;
            border: 2px solid #fdFcfa;
            border-radius: 15px;
        }

        .item {
            padding: 10px;
            display: flex;
            flex-direction: row;
            border-top: 1px solid #fdFcfa;
        }

        .item label {
            font-size: 20px;
            flex-basis: 50%;
        }

        .item input[type=text] {
            background-color: transparent;
            flex-basis: 50%;
            border: none;
            color: #fdFcfa;
            width: 20px;
            font-size: 20px;
        }

        .submit {
            margin: 10px auto;
            font-size: 20px;
            border: none;
            color: #fdFcfa;
            background-color: #343b4c;
        }

        #box-2 .hide {
            display: none;
        }
        h3{
            margin-top: 20px;
        }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <ul class="topnav">
        <li><a class="left" href="home.php">Home </a></li>
        <li><a class="left" href="menu.php">menu</a></li>
        <li><a class="left" href="#contact">Contact</a></li>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
            echo ' <li><a class="left" href="order.php">order</a></li>';
        }
        ?>
        <li class="right" id="cart"><a href="#about"><img class="cart" src="img/cart.png" alt=""> Cart</a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li class="right log" > 
                    <div class="dropdown" >
                        <button class="dropbtn"> '
                . $_SESSION["username"] .
                ' </button>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="history.php">History</a>
                            <a href="#">Settings</a>
                            <a href="logout.php">Log Out</a>
                        </div>
                    </div> 
                    </li>';
        }
        if (!isset($_SESSION['username'])) {
            echo '<li class="right log"  ><a  href="login.php">Login</a></li>';
        }

        ?>
        <li class="right" id="search">
            <div class="search">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>


    </ul>
    <center>
        <h1 class="title">My Cart</h1>
        <h3></h3>
    </center>
    <div class="container">
        <div class="box1">
            <table>
                <tr>
                    <td>No</td>
                    <td>Gambar</td>
                    <td>NamaMenu</td>
                    <td>Jumlah</td>
                    <td>Total</td>
                </tr>

                <?php
                include_once("koneksi.php");
                if (isset($_SESSION['cart'])) {

                    $sql = "SELECT * FROM menu WHERE IdMenu IN (";

                    foreach ($_SESSION['cart'] as $id => $value) {
                        $sql .= $id . ",";
                    }

                    $sql = substr($sql, 0, -1) . ") ORDER BY NamaMenu ASC";
                    $query = mysqli_query($koneksi, $sql);
                    $i = 1;
                    $totalHarga = 0;
                    $qty = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $total =   $row['Harga'] *  $_SESSION['cart'][$row['IdMenu']]['jlh'];
                        echo "<tr>";
                ?>
                        <td><?php echo $i ?></td>
                        <td><img src="<?php echo $row['Gambar'] ?>" alt=""></td>
                        <td><?php echo $row['NamaMenu'] ?></td>
                        <td><?php echo $_SESSION['cart'][$row['IdMenu']]['jlh'] ?> </td>
                        <td><?php echo $total ?>K </td>
                    <?php
                        echo "</tr>";
                        $qty = $qty + $_SESSION['cart'][$row['IdMenu']]['jlh'];
                        $totalHarga = $totalHarga +  $total;
                        $i++;
                    }
                }
                    ?>

            </table>
        </div>
   

    <div class="box2">
        <Center>
            <h1>Pay Now</h1>
        </Center>
        <form class="pay" action="transaksi.php" method="post">
            <div class="item">
                <label for="">
                    Total Barang
                </label>
                <input type="text" name="qty" readonly value=" <?php echo  $qty ?>">
            </div>
            <div class="item">
                <label for="">
                    Total Harga
                </label>
                <input type="text" name="totalHarga" readonly value=" <?php echo  $totalHarga ?>k">
            </div>
            <div class="item">
                <label for="">
                    Pajak(10%)
                </label>
                <input type="text" readonly value=" <?php echo  $totalHarga * 0.1 ?>k">
            </div>
            <div class="item">
                <label for="">
                    SubTotal
                </label>
                <input type="text" readonly name="subTotal" value=" <?php echo  $totalHarga * 1.1 ?>k">
            </div>
            <div class="item">
                <input class="submit" type="submit" name="Pay" value="Pay Now">
            </div>


        </form>

    </div>

    </div>

    <?php

if(!isset($_SESSION['cart'])){
    echo
    '<script>
        $( document ).ready(function() {
           $(".box2").hide("fast");
            $(".box1").hide("fast");
            $("h3").html("Your Card is Empty Add some Product")
        });
   </script>';
}

?>


</body>

</html>