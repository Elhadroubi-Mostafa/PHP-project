<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="group-input">
    <label for="">Name</label>
    <input type="text" name="name">
  </div>
  <div class="group-input">
    <label for="">image</label>
    <input type="file" name="image">
  </div>
  <button type="submit" name="sumbit">send</button>
  </form>
</body>
</html>
<?php
include('connect.php');
if(isset($_POST['sumbit'])){
  $name = $_POST['name'];
  $image = $_FILES['image'];
  echo $name;
  print_r(($image));
  $imageName = $image['name'];
  $tmpName = $image['tmp_name'];
  echo $imageName;
  echo $tmpName;
  $uploadImage = 'image/' . $imageName;
    move_uploaded_file($tmpName, $uploadImage);

  $stmt = $con->prepare("SELECT * FROM `lastphp` WHERE name =:n");
  $stmt->bindParam(':n', $name);
  $stmt->execute();
  $rowNumber = $stmt->rowCount();
  if($rowNumber > 0){
    echo "exist";
  }
  else{
    $stmt2 = $con->prepare("INSERT INTO `lastphp`(name, image) VALUES(:n, :i)");
    $stmt2->bindParam(':n', $name);
    $stmt2->bindParam(':i', $uploadImage);
    $stmt2->execute();
    header('location: data.php');
  }
}


?>