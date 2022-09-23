    <?php $title = 'Edit Record'; ?>
    <?php require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $results = $crud->getSpecialties();
    if(!isset($_GET['id'])){

       
        include 'includes/errormessage.php';
    header("location: viewrecords.php");
    }
    else{
        $id= $_GET['id'];
        $attendee =$crud->getAttendeeDetails($id);

    
    ?>

        <h1 class=" text-center">Edit Record</h1>

        <form method="post" action="editpost.php">
            <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>"/>

        <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstname" name="firstname" >
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastname" name="lastname" >
    </div>
    <div class="form-group">
        <label for="dob">date Of birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dob" name="dob" >
    </div>

    <div class="form-group">
        <label for="specialty">Area of Expertise</label>
        <select class="form-control" value="<?php echo $attendee['specialty_id']?>" id="specialty" name="specialty">
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
    <option value="<?php echo $r['specialty_id']; ?>" <?php if($r['specialty_id'] ==
    $attendee['specialty_id']) echo 'selected'; ?>>  
    <?php echo $r['name']; ?>
    </option>
    <?php }?>
        </select>
    </div>
        <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" id="email" name="email" aria-describedby="emailHelp" >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

        <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" id="phone" name="phone" aria-describedby="phoneHelp" >
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>    

    <button type="submit" class="btn btn-success btn-block" name="submit">save changes</button>
    <a href="viewrecords.php" class="btn btn-info btn-block">Back to List</a>
  

    </form>
    <?php }?>

        <?php require_once 'includes/footer.php'; ?>