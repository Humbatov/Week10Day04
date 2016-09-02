<?php
include "db_connect.php";
include "layout.php";

$db_telebe = new DB('localhost','root','','news');

$db_telebe->db_con();

 ?>
  <div class="container">
    <h1>Add new news</h1>
    <form class="" action="" method="post">
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
    $photo = $_POST["photo"];
    $author = $_POST["author"];
    $id = 1;
    // $col = "title, text_prev, text_first, text_last, author";
    // $value = "$title,$text_prev,$text_first,$text_last,$author";
    //  $db_telebe->insert("news","title,text_prev,text_first,text_last,author","`$title`,`$text_prev`,`$text_first`,`$text_last`,`$author`");
    $sql_up = "UPDATE news SET title = '$title' WHERE id=$id";
    $query = mysqli_query($db_telebe->db_con(),$sql_up);

    // if ($query) {
    //   header("Location:admin.php");
    // }else {
    //   echo "Errorx";
    // }
  }
 ?>
