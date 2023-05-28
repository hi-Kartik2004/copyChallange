<?php
session_start();
require_once("config.php");
$conn = mysqli_connect(username, password, server, database);

if ($conn) {
    // echo "Success";
    if (isset($_POST) && isset($_POST["name"])) {
        global $conn;
        print_r($_POST);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $year = $_POST["year"];
        $whatsApp = $_POST["whatsApp"];
        $react = 0;
        $html = 0;
        $php = 0;
        $c = 0;
        $cs = 0;
        $net = 0;
        // $others = 0;
        if (isset($_POST["react"])) {
            $react = 1;
        }
        if (isset($_POST["html"])) {
            $html = 1;
        }
        if (isset($_POST["php"])) {
            $php = 1;
        }
        if (isset($_POST["cpp"])) {
            $c = 1;
        }
        if (isset($_POST["cs"])) {
            $cs = 1;
        }
        if (isset($_POST["net"])) {
            $net = 1;
        }
        if (isset($_POST["others"])) {
            $others = $_POST["others"];
        }

        $intro = $_POST["intro"];
        if (isset($_FILES["resume"]) && $_FILES["resume"]["size"] < 510000) {
            $file = $_FILES["resume"];
            $fileName = $file['name'];
            $fileTmpPath = $file['tmp_name'];
            echo $file["size"];
        } else {
            $file = $_FILES["resume"];
            $size = $file["size"];
            if ($size > 50000) {
                echo "File size is larger than 5mb";
                header("location: ../");
                $_SESSION["error"] = "File size if large than 5mb";
                die("File size is larger than 5mb kills the further processing of this page...");
            } else {
                echo "File does not exist";
            }
        }

        //INSERT INTO `details` (`sno`, `name`, `email`, `year`, `mobile`, `whatsApp`, `HTML`, `PHP`, `React`, `C++`, `C#`, `net`, `Others`, `intro`, `resume`, `created_at`) VALUES (NULL, '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '', current_timestamp());
        $query = "INSERT INTO `details` (`sno`, `name`, `email`, `year`, `mobile`, `whatsApp`, `HTML`, `PHP`, `React`, `C++`, `C#`, `net`, `Others`, `intro`, `resume`) VALUES (NULL, '$name', '$email', '$year', '$mobile', '$whatsApp', '$html', '$php', '$react', '$c', '$cs', '$net', '$others', '$intro', '$fileTmpPath');";
        $run = mysqli_query($conn, $query);

        if ($run) {
            echo "inserted record-1";
            $_SESSION["success"] = true;
        } else {
            echo "Failed to insert record";
        }
    }
} else {
    echo "Failed to connect with the database";
}
