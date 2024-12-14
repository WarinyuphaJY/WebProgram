<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css"> 
</head>
<body class="bg">
    <center>
    <font size = "4">
        <?php
            $f_name = "Warinyupha ";
            $l_name = "Jiamyoo";
            $nickname = "Aim";
            $age = 20;
            $birthd = "13/07/2004";

            $f_header = "Personal Information";
            $s_header = "Student Information";
            
            echo "<b>$f_header</b>". "<br/>". "<br/>";
            echo "Name-Surname : ". $f_name. $l_name. "<br/>";
            echo "Nickname : ". $nickname. "<br/>";
            echo "Age : ". $age. " (Birthday ". $birthd. ")". "<br/>". "<br/>". "<br/>";

            $uni = "King Mongkut's University of Technology North Bangkok";
            $fac = "Industrial Technology and Management";
            $cam = "Prachin Buri";
            $enr = "2023";
            $id = "6606021610176";
            $t_image = "images/kmutnb04.jpg";
            
            echo "<b>$s_header</b>". "<br/>". "<br/>";
            echo "Studying at : ". $uni. "<br/>";
            echo $cam. " Campus.". " Enroll in year : ". $enr. "<br/>";
            echo "Bachelor of Science in : ". $fac. " (IT)". "<br/>".
            "ID : ". $id. "<br/>".
            "My homeroom IT-RA and I'm in my second year.". "<br/>". "<br/>";

            $elementarysc = "Don Duong School";
            $school = "Banmiwittaya School";
            $ele_graduated = "2016";
            $sc_graduated = "2022";

            echo "I'm graduated from elementary school from ". $elementarysc. " in ". $ele_graduated. "<br/>". 
            "And graduated middle school and high school from ". $school. " in ". $sc_graduated. "<br/>". "<br/>";

            echo '<img src="'. $t_image. '" alt="My Image" />';
        ?>
   </font>
   </center> 
</body>
</html>


