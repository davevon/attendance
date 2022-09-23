<?php $title = 'Success';
require_once 'includes/header.php';
require_once  'db/conn.php';


if(isset($_POST['submit'])){
  //extract the values from the $Post array
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $contact  = $_POST['phone'];
  $specialty = $_POST['specialty'];
  //call function to insert and track if success or not

  $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty);


  if($isSuccess){
    
    include 'includes/successmessage.php';}
  else{ 
  
    include 'includes/errormessage.php';
  }


}

 ?>
 <!--This prints out values that were passed to the action page using method="get"  -->
 <!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
       Name: <?php //echo $_GET['firstName'] . ' ' .  $_GET['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Spedcialty:<?php //echo $_GET['specialty'];?></h6>
    <p class="card-text"> Date of Birth: <?php // echo $_GET['dob'];?></p>
     <p class="card-text"> Contact Number: <?php // echo $_GET['phone'];?></p>

    <p class="card-text">Email: <?php //echo $_GET['email'];?></p>

  </div>
</div> -->
<!-- This prints out values that were passed to the action page using method ="post" -->
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
       Name: <?php echo $_POST['firstname'] . ' ' .  $_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Spedcialty:<?php echo $_POST['specialty'];?></h6>
    <p class="card-text"> Date of Birth: <?php  echo $_POST['dob'];?></p>
     <p class="card-text"> Contact Number: <?php  echo $_POST['phone'];?></p>

    <p class="card-text">Email: <?php echo $_POST['email'];?></p>

  </div>
</div>

<?php 



?>
<br>
<br>
<br>
<br>
<br>
<?php require_once  'includes/footer.php'; ?>

 