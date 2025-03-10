<?php
$ProductID = $_REQUEST['ProductID'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "coffeeshop";

// Connect to MySQL database
$conn = mysqli_connect($hostname, $username, $password);

// Check connection
if (!$conn) {
    die("<p style='color:red; text-align:center;'>Unable to connect to MySQL: " . mysqli_connect_error() . "</p>");
}

// Select the database
mysqli_select_db($conn, $dbName) or die("<p style='color:red; text-align:center;'>Unable to select coffeeshop database</p>");

// Prepare SQL query to delete product by ProductID
$sql = "DELETE FROM product WHERE ProductID='$ProductID'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "<div style='text-align:center; font-size: 20px; color: green; padding: 20px;'> Product deleted successfully ! </div>";
    echo "<br><div align='center'>
            <a href='ListOfCoffee.php'>
            <button style='background-color: #8e6e53; font-size: 16px; padding: 10px 20px; border-radius: 8px; cursor: pointer; color: white; border: none; transition: background-color 0.3s;'>Back to List</button>
            </a>
          </div>";
} else {
    echo "<div style='text-align:center; font-size: 20px; color: red; padding: 20px;'> Error deleting product: " . mysqli_error($conn) . "</div>";
}

// Close the database connection
mysqli_close($conn);
?>
