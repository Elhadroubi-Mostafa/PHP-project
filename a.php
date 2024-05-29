<?php 
include('connect.php');
// if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $image = $_FILES['image'];
  $id = $_POST['id'];
  echo $name;
  print_r(($image));
  $imageName = $image['name'];
  $tmpName = $image['tmp_name'];
  echo $imageName;
  echo $tmpName;
  $uploadImage = 'image/' . $imageName;
    move_uploaded_file($tmpName, $uploadImage);
// }

    $stmt2 = $con->prepare("UPDATE `lastphp` SET name =:n, image =:i WHERE id = $id");
    $stmt2->bindParam(':n', $name);
    $stmt2->bindParam(':i', $uploadImage);
    $stmt2->execute();
    echo "updated";
  

?>