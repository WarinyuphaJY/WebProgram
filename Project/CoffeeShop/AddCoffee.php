<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Unable to connect to MySQL");
}

mysqli_set_charset($conn, "utf8mb4");
mysqli_query($conn, "SET NAMES 'utf8mb4'");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user has filled in all the information
    if (empty($_POST['ProductID']) || empty($_POST['ProductName']) || 
    empty($_POST['ProductPrice']) || 
    empty($_POST['ProductQuantity'])) {
        echo "<script>alert('Please fill in all information completely.');</script>";
    } else {
        // Get values from FORM
        $productID = mysqli_real_escape_string($conn, $_POST['ProductID']);
        $productName = mysqli_real_escape_string($conn, $_POST['ProductName']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['ProductPrice']);
        $productQuantity = mysqli_real_escape_string($conn, $_POST['ProductQuantity']);
        
        // Record data into the database
        $query = "INSERT INTO products (ProductID, ProductName, ProductPrice, ProductQuantity) 
        VALUES ('$productID', '$productName', '$productPrice', '$productQuantity')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            // Redirect to ListOfCoffee.php after successfully inserting data
            echo "<script>alert('The data has been successfully recorded');</script>";
            header('Location: ListOfCoffee.php');  // Redirects to ListOfCoffee.php
            exit(); // Make sure to call exit after header to stop further script execution
        } else {
            echo "<script>alert('Data recording error');</script>";
        }
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title> Add Coffee Shop Information </title>
    <style>
        /* การตกแต่งพื้นหลัง */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f1e1;
            background-image: url('https://www.transparenttextures.com/patterns/cookie.png');
            background-repeat: repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #4e342e;
        }

        /* การตกแต่งฟอร์ม */
        .form-container {
            background-color: #f8e6d4;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 650px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        /* หัวข้อฟอร์ม */
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: #6d4c41;
            font-family: 'Pacifico', cursive;
            text-align: center;
        }

        /* การตกแต่ง Input */
        .input-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .input-group label {
            font-size: 18px;
            color: #6d4c41;
            display: block;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #c2b0a2;
            border-radius: 8px;
            margin-top: 5px;
            background-color: #fff8f0;
            color: #4e342e;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #6d4c41;
            box-shadow: 0 0 8px #6d4c41;
        }

        /* ปุ่ม Submit และ Cancel */
        .form-btn {
            width: 100%;
            padding: 14px;
            font-size: 18px;
            background-color: #f2d0a4; /* สีเดียวกันสำหรับ Submit และ Cancel */
            color: #4e342e;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Roboto', sans-serif;
        }

        .form-btn:hover {
            background-color: #e6b47d;
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .form-btn:active {
            background-color: #d69f5b;
            transform: scale(0.98);
        }

        /* ปุ่มกลับ */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .form-actions input {
            cursor: pointer;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            background-color: #f2f2f2;
            transition: 0.3s;
        }

        .form-actions input:hover {
            background-color: #e6e6e6;
        }

        /* แอนิเมชัน Fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h2> 🥐 Add Menu 🥤 </h2>
        <form enctype="multipart/form-data" name="save" method="post" action="SaveCoffee.php">
            <div class="input-group">
                <label for="ProductID"> Product ID : </label>
                <input type="text" name="ProductID" size="10" maxlength="4" required>
            </div>
            <div class="input-group">
                <label for="ProductName"> Product Name : </label>
                <input type="text" name="ProductName" size="50" maxlength="50" required>
            </div>
            <div class="input-group">
                <label for="ProductPrice"> Product Price : </label>
                <input type="text" name="ProductPrice" size="50" maxlength="50" required>
            </div>
            <div class="input-group">
                <label for="ProductQuantity"> Product Quantity : </label>
                <input type="text" name="ProductQuantity" size="50" maxlength="50" required>
            </div>

            <div class="form-actions">
                <a href="ListOfCoffee.php" style="text-decoration:none;">
                    <input type="button" value=" Back ">
                </a>
                <input type="submit" value=" Submit " class="form-btn">
                <input type="reset" value=" Cancel " class="form-btn">
            </div>
        </form>
    </div>

</body>
</html>
