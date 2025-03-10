<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";

// Connect database
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
}

// Set Thai language
mysqli_set_charset($conn, "utf8mb4");

// Check if the data has been sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the information has been filled in
    if (empty(trim($_POST['ProductID'])) || empty(trim($_POST['ProductName'])) || 
        empty(trim($_POST['ProductPrice'])) || empty(trim($_POST['ProductQuantity']))) {

        echo "<script>
                alert('⚠️ Please fill in all fields ⚠️');
                window.location.href = 'AddCoffee.php';
              </script>";
        exit(); // Stop PHP execution after warning
    }

    // Get values ​​from FORM
    $ProductID = mysqli_real_escape_string($conn, trim($_POST['ProductID']));
    $ProductName = mysqli_real_escape_string($conn, trim($_POST['ProductName']));
    $ProductPrice = mysqli_real_escape_string($conn, trim($_POST['ProductPrice']));
    $ProductQuantity = mysqli_real_escape_string($conn, trim($_POST['ProductQuantity']));

    // SQL command to save product data
    $sql = "INSERT INTO product (ProductID, ProductName, ProductPrice, ProductQuantity) 
            VALUES ('$ProductID', '$ProductName', '$ProductPrice', '$ProductQuantity')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('✅ Data saved successfully ✅');
                window.location.href = 'ListOfCoffee.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ An error occurred: " . mysqli_error($conn) . " ❌');
                window.location.href = 'AddCoffee.php';
              </script>";
    }
} else {
    // If you click on the file directly without going through the form
    echo "<script>
            alert('⚠️ No additional information found. Please fill in the information first ⚠️');
            window.location.href = 'AddCoffee.php';
          </script>";
}

// Close database connection
mysqli_close($conn);
?>
