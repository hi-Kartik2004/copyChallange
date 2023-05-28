<?php

session_start();
if (isset($_SESSION["error"])) {
    echo '<script>alert("File size if larger than 5mb");</script>';
    unset($_SESSION["error"]);
} else if (isset($_SESSION["success"])) {
    echo '<script>alert("Record inserted into database successfully");</script>';
    // echo "No errors";
}
include("pages/header.php");
include("pages/contact.php");
include("pages/contact2.php");
include("pages/footer.php");
