    <?php

    require_once 'db/conn.php';
    if (!$_GET['id']){
        include 'includes/errormessage.php';
        header("location: viewrecords.php");
    }
    else{
        //  get ID value 
        $id = $_GET['id'];

        //call delete method
        $results =$crud->deleteAttendee($id);
        // redirect to list
    if ($results) { 
        header("Location:viewrecords.php");

    }
    else {
        echo '';
    }   
    }
        ?>