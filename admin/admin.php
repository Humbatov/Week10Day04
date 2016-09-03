<?php
  include "layout.php";
  include "db_connect.php";

  $db_telebe = new DB('localhost','root','','blog');

  $db_telebe->db_con();
  $query = $db_telebe->show("news");
 ?>
       <div class="container">
            <h1>Administrator paneli </h1>
            <a class="btn btn-warning pull-right" href='logout.php'>LOGOUT</a>

                <?php
                session_start();

                 if(!$_SESSION['login'] == true){
                     header('Location:index.php');
                 } ?>

                 <div class="container">
                   <a style="margin: 10px 0;" class="btn btn-success" href="create.php">Create</a>
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>Title</th>
                         <th>Text preview</th>
                         <th>Text first</th>
                         <th>Text last</th>
                         <th>Photo</th>
                         <th>Author</th>
                         <th>Create date</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>

                         <?php
                         while ($row = mysqli_fetch_assoc($query)) {
                           ?>
                           <tr>
                           <td><?= $row["title"] ?></td>
                           <td><?= $row["text_prev"] ?></td>
                           <td><?= $row["text_first"] ?></td>
                           <td><?= $row["text_last"] ?></td>
                           <td><?= $row["photo"] ?></td>
                           <td><?= $row["author"] ?></td>
                           <td><?= $row["create_date"] ?></td>
                           <td>
                             <a style="margin: 10px auto" class="btn btn-warning" href="update.php?id=<?= $row["id"] ?>">Update</a>
                             <a style="margin: 10px auto" class="btn btn-danger" href="delete.php?id=<?= $row["id"] ?>">Delete</a>
                           </td>
                           </tr>
                           <?php
                           // echo "<pre>";
                           // print_r($row);
                         }
                          ?>


                     </tbody>
                   </table>
                 </div>






        </div>
    </body>
</html>
