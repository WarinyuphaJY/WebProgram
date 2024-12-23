<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>firstnameNickname</title>
</head>
<body>
<center>
    <?php if(isset($_POST['submit'])) {
        $filename = $_POST['filename'];
        $text = file($filename);
        foreach($text as $tr_data ) {
            $col = 1;
            $array_word = explode( ",", $tr_data);

            foreach($array_word as $value) {
                $value = trim($value);
                if ($col == 1) {
                    echo $value;
                }
                else {
                    if ($value == "Robert")
                        echo "Dick";
                    elseif ($value == "Dick")
                        echo "Robert";

                    if ($value == "William")
                        echo "Bill";
                    elseif ($value == "Bill")
                        echo "William";

                    if ($value == "James")
                        echo "Jim";
                    elseif ($value == "Jim")
                        echo "James";

                    if ($value == "John")
                        echo "Jack";
                    elseif ($value == "Jack")
                        echo "John";

                    if ($value == "Margaret")
                        echo "Peggy";
                    elseif ($value == "Peggy")
                        echo "Margaret";

                    if ($value == "Edward")
                        echo "Ed";
                    elseif ($value == "Ed")
                        echo "Edward";

                    if ($value == "Sarah")
                        echo "Sally";
                    elseif ($value == "Sally")
                        echo "Sarah";

                    if ($value == "Andrew")
                        echo "Andy";
                    elseif ($value == "Andy")
                        echo "Andrew";

                    if ($value == "Anthony")
                        echo "Tony";
                    elseif ($value == "Tony")
                        echo "Anthony";

                    if ($value == "Deborah")
                        echo "Debbie";
                    elseif ($value == "Debbie")
                        echo "Deborah";
                }
                $col++ ;
            }
        }
    }

    else {
        ?>
        <form name="mid2" action="firstnameNickname.php" method="post">
            <h3>firstnameNickname.php</h3>
            <table width="400" border="0" align="center">
                <tr>
                    <td width="100"><br>File name</td> 
                    <td width="100" align="center"><br>
                    <input type="text" name="fileName" size="40">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value=" SUBMIT " />
                        <input type="reset" name="reset" value=" RESET " />
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>

</center>
</body>
</html>