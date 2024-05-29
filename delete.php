<?php
include('connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  echo $id;
  $stmt = $con->prepare("DELETE FROM `lastphp` WHERE id = $id");
  $stmt->execute();
  header('location: data.php');
}
?>