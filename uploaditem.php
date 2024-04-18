<?php
require "config.php";

$name = $_POST['ItemName'];

if ($_FILES['Pic']['error'] === UPLOAD_ERR_OK) {

    $tmpFilePath = $_FILES['Pic']['tmp_name'];
    

    $itemPictureData = file_get_contents($tmpFilePath);

} else {
    $msg = $_FILES['Pic']['error'];
    header("Location:admin.php?msg=".urlencode($msg));
}


$userID = $_POST['UserID'];


        $stmt = $pdo->prepare("INSERT INTO Items (Name, Picture, UserID) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $itemPictureData,$userID])) {
            $msg = "Item Inserted Successfuly!";
        } else {
            $msg = "Error: " . $conn->error;
        }
        header("Location:admin.php?msg=".urlencode($msg));

?>
