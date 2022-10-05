<?php
$title = 'view Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

//get all records from  attendee database by id

if (!isset($_GET['id'])) {
  include 'includes/errormessage.php';
} else {
  $id = $_GET['id'];
  $result = $crud->getAttendeeDetails($id);


?>
  <img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path']; ?>" class="rounded-circle" style="width 10%; height :10%" >

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        <?php echo $result['firstname'] . ' ' .  $result['lastname']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted">Specialty:<?php echo $result['name']; ?></h6>

      <p class="card-text"> Date of Birth: <?php echo $result['dateofbirth']; ?></p>
      <p class="card-text"> Contact Number: <?php echo $result['contactnumber']; ?></p>

      <p class="card-text">Email: <?php echo $result['emailaddress']; ?></p>

    </div>
  </div>
  <br>
  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
  <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
  <a onclick="return confirm('are you sure you want to Delete this?')" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a></td>

<?php } ?>


<br>
<br>
<br>
<?php

require_once 'includes/footer.php';
?>