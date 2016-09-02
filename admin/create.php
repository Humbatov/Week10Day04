<?php
include "db_connect.php";
include "layout.php";

$db_telebe = new DB('localhost','root','','blog');

$db_telebe->db_con();

 ?>
  <div class="container">
    <h1>Add new news</h1>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" value="" id="title">
      </div>
      <div class="form-group">
        <label for="text_prev">Text preview:</label>
        <textarea class="form-control" name="text_prev" rows="8" cols="40" id="text_prev"></textarea>
      </div>
      <div class="form-group">
        <label for="text_first">Text first :</label>
        <textarea class="form-control" name="text_first" rows="8" cols="40" id="text_first"></textarea>
      </div>
      <div class="form-group">
        <label for="text_last">Text last	:</label>
        <textarea class="form-control" name="text_last" rows="8" cols="40" id="text_last"></textarea>
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input class="form-control" type="file" name="photo" value="" id="photo">
      </div>
      <div class="form-group">
        <label for="author">Author:</label>
        <input class="form-control" type="text" name="author" value="" id="author">
      </div>
      <div class="form-group">
      <input class="btn btn-success" type="submit" name="submit" value="Save">
      <a class="btn btn-success" href="admin.php">Back</a>
      </div>
    </form>
  </div>

</body>
</html>

<?php
  if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $text_prev = $_POST["text_prev"];
    $text_first = $_POST["text_first"];
    $text_last = $_POST["text_last"];

    $img_name = rand() . rand() . $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $upload_dir = "../images/";
    $img_src = $upload_dir . $img_name;

    $author = $_POST["author"];
    $col = "`title`, `text_prev`, `text_first`, `text_last`,`photo`, `author`";
    $value = "'$title','$text_prev','$text_first','$text_last','$img_name','$author'";
    $query = $db_telebe->insert("news",$col,$value);


    if ($query) {
      move_uploaded_file($tmp_name,$img_src);
      header("Location:admin.php");
    }else {
      echo "Errorx";
    }
  }
 ?>
