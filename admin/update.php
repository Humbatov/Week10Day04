<!-- TODO: Исправить ошибку (header("Location:admin.php"))  -->
<?php
include "db_connect.php";
include "layout.php";

  $id = $_GET["id"];

  $db_telebe = new DB('localhost','root','','blog');
  $db_telebe->db_con();
  $query = $db_telebe->show("news","WHERE","id=$id");
  $row = mysqli_fetch_assoc($query);

   ?>
   <?php if (isset($_GET["id"])){ ?>
     <div class="container">
       <h1>Add new news</h1>
       <form class="" action="" method="post" enctype="multipart/form-data">
         <div class="form-group">
           <label for="title">Title:</label>
           <input class="form-control" type="text" name="title" value="<?= $row["title"] ?>" id="title">
         </div>
         <div class="form-group">
           <label for="text_prev">Text preview:</label>
           <textarea class="form-control" name="text_prev" rows="8" cols="40"  id="text_prev"><?= $row["text_prev"] ?></textarea>
         </div>
         <div class="form-group">
           <label for="text_first">Text first :</label>
           <textarea class="form-control" name="text_first" rows="8" cols="40"  id="text_first"><?= $row["text_first"] ?></textarea>
         </div>
         <div class="form-group">
           <label for="text_last">Text last	:</label>
          <textarea class="form-control" name="text_last" rows="8" cols="40"  id="text_last"> <?= $row["text_last"] ?></textarea>
         </div>
         <div class="row">
           <div class="form-group">
             <div class="col-md-6">
               <label for="photo">Photo:</label>
               <input  class="form-control" type="file" name="photo" value=""  >

             </div>
             <div class="col-md-6">
               <div class="thumbnail">
                 <img src="../images/<?= $row["photo"] ?>" alt="" />
               </div>
             </div>
           </div>
         </div>
         <div class="form-group">
           <label for="author">Author:</label>
           <input class="form-control" type="text" name="author" value="<?= $row["author"] ?>" id="author">
         </div>
         <div class="form-group">
         <input class="btn btn-success" type="submit" name="submit" value="Save">
         <a class="btn btn-success" href="admin.php">Back</a>
         </div>
       </form>
     </div>

   <?php
        }

    ?>
 </body>
 </html>

 <?php
  if (isset($_POST["submit"])) {
    $title = addslashes($_POST["title"]);
    $text_prev = addslashes($_POST["text_prev"]);
    $text_first = addslashes($_POST["text_first"]);
    $text_last = addslashes($_POST["text_last"]);
    $photo = $row["photo"];
    $dir = "../images";
    $img_names = scandir($dir);


    $img_name = $_FILES["photo"]["name"];

    if (!isset($img_name)) {
     $img_name = $row["photo"];
    }
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $upload_dir = "../images/";
    $img_src = $upload_dir . $img_name;

    $author = $_POST["author"];
    $column = "title='$title',text_prev='$text_prev',text_first='$text_first',text_last='$text_last',photo='$img_name',author='$author'";
    $query_update = $db_telebe->update("news",$column,"id='$id'");

    // print_r("<pre>");
    // print_r($img_names);
    // print_r("</pre>");

    if ($query_update) {
      if (isset($photo)) {
        $access = true;
        for ($i=0; $i < count($img_src); $i++) {
          if ($img_src[$i] == $img_name ) {
            $access = false;
          }
        }
        if ($access) {
          move_uploaded_file($tmp_name,$img_src);
        }

      }
      // header("Location:admin.php");
    }else {
      echo "Error";
    }
    }
  ?>
