<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Coffee Update </title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #5f4b41;
            padding: 40px;
        }

        h1 {
            font-size: 36px;
            color: #8e6e53;
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            width: 70%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
        }

        td {
            padding: 12px;
            font-size: 18px;
            color: #5f4b41;
        }

        td input[type="text"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #e3c0a0;
            border-radius: 6px;
            font-size: 16px;
            color: #5f4b41;
            background-color: #f4e1c1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color:rgb(249, 249, 249);
        }

        .header {
            background-color: #8e6e53;
            text-align: center;
            font-size: 20px;
            padding: 20px;
            color: white;
            border-radius: 8px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .button-container input[type="submit"],
        .button-container input[type="button"] {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #8e6e53;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button-container input[type="submit"]:hover,
        .button-container input[type="button"]:hover {
            background-color: #6f4b3d;
            transform: scale(1.05);
        }

        .table-container form {
            margin-top: 20px;
        }

        .table-container table {
            margin-bottom: 30px;
        }

        .table-container a {
            text-decoration: none;
        }

    </style>
</head>
<body>

<center>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "coffeeshop";

    // Connect database
    $conn = mysqli_connect($hostname, $username, $password, $dbName);
    if (!$conn) {
        die("Unable to connect to MySQL: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8mb4");

    // Check if ProductID has been sent
    if (isset($_GET['ProductID'])) {
        $productID = mysqli_real_escape_string($conn, $_GET['ProductID']);

        // Pull data from the database
        $sql = "SELECT * FROM product WHERE ProductID = '$productID'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("An error occurred while retrieving data: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_array($result);
        if (!$row) {
            die("Menu information not found");
        }
    } else {
        die("Menu code not found in URL");
    }

    // When you press the update information button
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newProductID = mysqli_real_escape_string($conn, $_POST['productID']);
        $productName = mysqli_real_escape_string($conn, $_POST['productName']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
        $productQuantity = mysqli_real_escape_string($conn, $_POST['productQuantity']);

        // Update information in the database
        $updateSQL = "UPDATE product
                    SET ProductID = '$newProductID',
                        ProductName = '$productName',
                        ProductPrice = '$productPrice',
                        ProductQuantity = '$productQuantity'
                    WHERE ProductID = '$productID'";

        if (mysqli_query($conn, $updateSQL)) {
            echo "<br><font size='5' color='green'> Menu information has been updated ! </p>";
            echo "<a href='ListOfCoffee.php'>
            <button style='background-color: #8e6e53; font-size: 16px; padding: 10px 20px; 
            border-radius: 8px; cursor: pointer; color: white; border: none; 
            transition: background-color 0.3s;'>Back to List</button>
            </a>";
        } else {
            echo "<br> An error occurred: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        exit;
    }
    ?>
    
    <div class="table-container">
        <form method="post">
            <table>
                <tr>
                    <td colspan="2" class="header">
                        <b> 🍪 Edit Menu Information 🥛 </b>
                    </td>
                </tr>
                <tr>
                    <td> Menu ID : </td>
                    <td><input type="text" name="productID" value="<?php echo $row['ProductID']; ?>" required></td>
                </tr>
                <tr>
                    <td> Menu Name : </td>
                    <td><input type="text" name="productName" value="<?php echo $row['ProductName']; ?>" required></td>
                </tr>
                <tr>
                    <td> Price :</td>
                    <td><input type="text" name="productPrice" value="<?php echo $row['ProductPrice']; ?>" required></td>
                </tr>
                <tr>
                    <td> Quantity : </td>
                    <td><input type="text" name="productQuantity" value="<?php echo $row['ProductQuantity']; ?>" required></td>
                </tr>
            </table>

            <div class="button-container">
                <a href="ListOfCoffee.php">
                    <input type="button" value=" Back ">
                </a>
                <input type="submit" name="Submit" value=" Submit ">
            </div>
        </form>
    </div>

</center>

</body>
</html>
