<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - Coffee Shop </title>

    <style>
        /* การตกแต่งพื้นหลังให้ดูอบอุ่น */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f1e1;
            background-image: url('https://www.transparenttextures.com/patterns/coffee-bag-2.png');
            background-repeat: repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #4e342e;
        }

        /* การตกแต่งฟอร์ม */
        .login-container {
            background-color: #f8e6d4;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            border: 1px solid #d3c6b1;
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        /* หัวข้อฟอร์ม */
        .login-container h2 {
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

        /* ปุ่ม Login */
        .login-btn {
            width: 100%;
            padding: 14px;
            font-size: 18px;
            background-color: #6d4c41;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-btn:hover {
            background-color: #8d6e63;
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .login-btn:active {
            background-color: #5d4037;
            transform: scale(0.98);
        }

        .login-btn::before {
            content: '☕ ';
            margin-right: 8px;
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

        /* การตกแต่งพื้นหลังของไอคอน */
        .input-group span {
            font-size: 22px;
            color: #6d4c41;
        }

        /* ตกแต่งอิโมจิในป้าย */
        .emoji {
            font-size: 28px;
            color: #6d4c41;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

    <?php
    session_start();
    session_destroy();
    ?>

    <div class="login-container">
        <h2> Login </h2>
        <div class="emoji"> 🍪☕🍰 </div>
        <form action="CheckUser.php" method="post">
            <div class="input-group">
                <label for="Username"> Username : </label>
                <input type="text" name="Username" id="Username" required>
            </div>
            <div class="input-group">
                <label for="Password"> Password : </label>
                <input type="password" name="Password" id="Password" maxlength="4" required>
            </div>
            <button type="submit" class="login-btn"> Login </button>
        </form>
    </div>

</body>
</html>
