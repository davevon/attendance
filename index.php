  <?php $title = 'Index'; ?>
  <?php require_once 'includes/header.php';
  require_once 'db/conn.php';
  $results = $crud->getSpecialties();
  ?>

  <!--
    - First Name
    - Last Name
    - Date Of birth(Use Date Picker
    - Specialty (Database Admin, software engineering,web administration, other
    - Email Address
    - Contact Number
  -->
  <h1 class=" text-center">Registration for IT Conference</h1>

  <form method="post" action="success.php" enctype="multipart/form-data">

    <div class="form-group">
      <label for="firstname">First Name</label>
      <input require type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input require type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="dob">date Of birth</label>
      <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="form-group">
      <label for="specialty">Area of Expertise</label>
      <select class="form-control" id="specialty" name="specialty">
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php echo $r['specialty_id']; ?>"><?php echo $r['name']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input require type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="phone">Contact Number</label>
      <input require type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
      <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
<br>
    <div class="custom-file">
      <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
      <label class="custom-file-label" for="avatar">Choose File</label>
      <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
    </div>


    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>

  </form>