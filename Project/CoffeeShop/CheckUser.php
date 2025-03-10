<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Check User </title>
    <style>
        body {
            background-color: #f5f5dc; /* สีเบจแบบวินเทจ */
            font-family: 'Georgia', serif;
            text-align: center;
        }
        .container {
            margin-top: 100px;
            padding: 20px;
            background: #fff8dc; /* สีครีมอ่อน */
            border: 3px solid #8b4513; /* กรอบสีน้ำตาลเข้ม */
            border-radius: 10px;
            display: inline-block;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        }
        .message {
            font-size: 20px;
            color: red;
        }
        .button-container {
            margin-top: 20px;
        }
        button {
            background-color: #8b4513; /* สีน้ำตาล */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        button:hover {
            background-color: #a0522d; /* สีน้ำตาลอ่อนลง */
            transform: scale(1.05); /* ขยายเล็กน้อย */
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    session_start();

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "session";

    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn) die("<p class='message'>Unable to connect to MySQL</p>");
    mysqli_select_db($conn, $dbname) or die("<p class='message'>Unable to select session database</p>");

    $sqltxt = "SELECT * FROM login WHERE username = '$Username'";
    $result = mysqli_query($conn, $sqltxt);
    $rs = mysqli_fetch_array($result);

    if ($rs) {
        if ($rs['password'] == $Password) {
            $_SESSION['Username'] = $Username;
            header("Location: Welcome.php?Username=$Username");
            exit;
        } else {
            echo "<p class='message'>Password not match!</p>";
        }
    } else {
        echo "<p class='message'>Not found Username <span style='color: blue;'>" . htmlspecialchars($Username) . "</span>!</p>";
    }
    ?>

    <div class="button-container">
        <a href='login.php'><button>Return to login page</button></a>
    </div>
</div>

</body>
</html>

