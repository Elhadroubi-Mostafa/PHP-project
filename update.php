<?php 
include('connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  echo $id;
  $stmt= $con->prepare("SELECT * FROM `lastphp` WHERE id =:id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $item = $stmt->fetch(PDO::FETCH_ASSOC);
 
  
// }

  $stmt2 = $con->prepare("UPDATE `lastphp` SET name =:n, image =:i WHERE id = $id");
  $stmt2->bindParam(':n', $name);
  $stmt2->bindParam(':i', $uploadImage);
  $stmt2->execute();
  header('location: data.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="a.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $item['id']?>">
  <div class="group-input">
    <label for="">Name</label>
    <input type="text" name="name" value="<?php echo $item['name']?>">
  </div>
  <div class="group-input">
    <label for="">image</label>
    <input type="file" name="image">
  </div>
  <button type="submit" name="sumbit">update</button>
  </form>
</body>
</html>
<?php

?>