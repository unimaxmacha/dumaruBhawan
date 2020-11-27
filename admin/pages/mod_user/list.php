<?php
$heading  = "User Management";
$m     = "user";
$form  = "form";
$view  = "view";

$sql = "SELECT * FROM tbl_users";

?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><?php echo $heading; ?></h4>
          </div>
          <div class="col-12">
            <div class="buttons btn-lg float-right">
              <a href="<?php echo base_url('admin/index.php?m='.$m.'&p='.$form); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-user-plus"></i> Add User</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Contact No</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sn = 1;
                    if ($result = $dbConn->query($sql)) {
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_array()) {
                    ?>
                          <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $row['firstname']. ' '.$row['lastname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><a href="#" class="btn btn-danger"><?php echo($row['status']==1)?"Active":"Inactive"; ?></a></td>
                            <td><a href="#" class="fa fa-eye"></a> | <a href="#" class="far fa-edit"></a> | <a href="#" class="far fa-trash-alt"></a></td>
                          </tr>
                  <?php
                    $sn++;
                        }
                      } else {
                        echo "No record in the table.";
                      }
                    } else {
                      echo "Wrong Select Query!";
                    }
                  ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>