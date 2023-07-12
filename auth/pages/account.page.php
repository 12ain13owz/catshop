<?php
  $sql = "SELECT * FROM account";
  $qry = mysqli_query($conn, $sql);
  $fade = "animate__fadeInRight";
?>

<div class="container pt-3 fade-in">
  <h2>Account Data</h2>
  <hr>

  <div class="row bg-white pt-4 mb-5">
    <div class="col-12">
      <table class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Username</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Type</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php
            while ($data = mysqli_fetch_array($qry)) {              
              $type = $data['type'];
              if ($type == 0) $type = 'Administrator';
              if ($type == 1) $type = 'User';
              $linkEdit = 'account_edit.php?accid=' .$data['id'];
              $linkDel = './controllers/account_del.controller.php?accid=' .$data['id'];                                        

              $delay = 0;
              if ($fade == "animate__fadeInRight") {
                $fade = "animate__fadeInLeft";
              } else  {
                $fade = "animate__fadeInRight";
              }
              
              $animate = 'animate__animated '. $fade. ' animate__delay-'. $delay.'s';
              
              echo "
                <tr class='$animate'>
                  <td>$data[id]</td>
                  <td>$data[username]</td>                  
                  <td>$data[firstname]</td>                  
                  <td>$data[lastname]</td>
                  <td>$type</td>
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