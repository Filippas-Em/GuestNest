<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo "You need to be logged in to create a listing.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $rooms = mysqli_real_escape_string($conn, $_POST['rooms']);  // Assuming rooms is numeric
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $user_id = $_SESSION['user_id']; 

    $target_dir = "Assets/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            exit();
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO listings (user_id, title, description, price, location, image_path, rooms)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "issssss", $user_id, $title, $description, $price, $location, $target_file, $rooms);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            echo "Listing created successfully.";
            header("Location: index.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
        exit();
    }

    mysqli_close($conn);
}
?>
