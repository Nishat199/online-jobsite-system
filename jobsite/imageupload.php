<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value="" />

            <div>
                <button type="submit" name="upload">
                    UPLOAD
                </button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
error_reporting(0);
?>
<?php
$msg = "";
if (isset($_POST['upload'])) {

    echo $filename = $_FILES["uploadfile"]["name"];
    echo '<hr>';
    echo $tempname = $_FILES["uploadfile"]["tmp_name"];
    echo '<hr>';

    echo $folder = "image/" . $filename;
    echo '<hr>';

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "jobsite";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO `resume` (`userid`, `image`) VALUES 
                                     ('29','$filename')";
            $sql = "INSERT INTO `resume` (`userid`, `name`) VALUES ('30','$filename')";

        
        // Execute query
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }


        echo '<image src="' . $folder . '" width="100px" height="100px">';
    } else {
        $msg = "Failed to upload image";
    }
}

echo $msg;
?>