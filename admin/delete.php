<?php
include "db_connect.php";

$db_telebe = new DB('localhost','root','','blog');

$db_telebe->db_con();

if (isset($_GET['id'])) {
  $id = $_GET["id"];
  $query = $db_telebe->delete("news",$id);
  var_dump($query);
  header("Location:admin.php");

}
 ?>
