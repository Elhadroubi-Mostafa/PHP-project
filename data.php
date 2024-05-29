<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php 
  include('connect.php');
  $stmt = $con->prepare("SELECT * FROM `lastphp`");
  $stmt->execute();
  $rowNumber = $stmt->rowCount();
  if($rowNumber > 0){
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  print_r($data);
  
  ?>
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>image</th>
        <th>actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($data as $item){
?>
        <tr>
          <td><?php echo $item['id']?></td>
          <td><?php echo $item['name']?></td>
          <td><img src="<?php echo $item['image']?>" style="width: 100px;" alt="image"></td>
          <td>
            <a href="update.php?id=<?php echo $item['id']?>">update</a>
            <a href="delete.php?id=<?php echo $item['id']?>">delete</a>
            
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <?php
  }
  ?>
</body>
</html>