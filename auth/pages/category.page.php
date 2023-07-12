<?php
  $sql = "SELECT * FROM category";
  $qry = mysqli_query($conn, $sql);
?>

<div class="container pt-3 fade-in">
  <h2>Cagetory Data <a href="category_new.php" class="btn btn-primary"><i class="fas fa-plus"></i> New Category</a>
  </h2>
  <hr>

  <div class="row bg-white pt-4 mb-5">
    <div class="col-12">
      <table class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php
            while ($data = mysqli_fetch_array($qry)) {
              $linkEdit = 'category_edit.php?catId=' .$data['catId'];
              $linkDel = './controllers/category_del.controller.php?catId=' .$data['catId'];                           

              echo "
                <tr>
                  <td>$data[catId]</td>
                  <td>$data[catName]</td>                                       
                  <td><a href='$linkEdit' class='btn btn-success'><i class='fas fa-edit'></i></a></td>
                  <td><button class='btn btn-danger' onclick='onDelete(`$linkDel`)'><i class='fas fa-minus'></i></button></td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</div>