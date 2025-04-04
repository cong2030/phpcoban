

<?php
    $str1 = "Hello";
    $str2 = "World";
    echo $str1 . " " . $str2 . "<br>"; // Nối chuỗi
    echo "Độ dài chuỗi: " . strlen($str1 . " " . $str2);

    $text = " PHP Cơ Bản";
    echo strtoupper($text) . "<br>";
    echo strtolower($text) . "<br>"; 
    echo str_replace("PHP", "Web", $text) . "<br>"; 
    print_r(explode(" ", $text)); 

    $numbers = array(1, 2, 3, 4, 5);
    foreach ($numbers as $num) {
        echo $num . " ";
    }
    echo "<br>Tổng: " . array_sum($numbers);

    $student = array("name" => "Công", "age" => 20, "grade" => "10");
    echo " <br> Tên: " . $student["name"] . "<br>Tuổi: " . $student["age"] . "<br>Điểm: " . $student["grade"];

    $matrix = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
    );
    echo "<br>Phần tử [1][2]: " . $matrix[1][2];
?>
