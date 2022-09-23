<?php 
    class crud{
//private database object\
    private $db;

    //constructor to initialize private database
    function __construct($conn){
     $this->db = $conn;
    }

    public function insertAttendees($fname,$lname,$dob,$email,$contact,$specialty){
        try {
            // define the sql statemen for execution
            $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) Values (:fname, :lname, :dob, :email, :contact, :specialty)";
$stmt =$this->db->prepare($sql);
//bind all the placeholders to the actual calues

$stmt->bindparam(':fname',$fname);
$stmt->bindparam(':lname',$lname);
$stmt->bindparam(':dob',$dob);
$stmt->bindparam(':email',$email);
$stmt->bindparam(':contact',$contact);
$stmt->bindparam(':specialty',$specialty);
$stmt->execute();   
return true;

} catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $e->getMessage();
      return false;
        }

    }

    public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty) {
try {
    //code...
    $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname, `dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact ,`specialty_id`=:specialty WHERE attendee_id = :id ";
    
    $stmt = $this->db->prepare($sql);
//bind all the placeholders to the actual calues
$stmt->bindparam(':id',$id);
$stmt->bindparam(':fname',$fname);
$stmt->bindparam(':lname',$lname);
$stmt->bindparam(':dob',$dob);
$stmt->bindparam(':email',$email);
$stmt->bindparam(':contact',$contact);
$stmt->bindparam(':specialty',$specialty);
$stmt->execute();   
return true;

} catch (PDOException $e) {
    //throw $th;
    echo "Error: " . $e->getMessage();
return false;
}

}


    public function getAttendees() {
        try {
            //code...
             $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
        $result = $this->db->query($sql);
        return $result;

        } catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $e->getMessage();
        return false;
        }
       
    }

    public function getAttendeeDetails($id) {
        try {
            //code...
             $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $e->getMessage();
        return false;
        }

       
        
    }

    public function deleteAttendee($id) {
        try {
        $sql = "DELETE FROM attendee WHERE attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage();
            return false; 
        }


    }

    public function getSpecialties() {
        try {
            //code...
               $sql = "SELECT * FROM `specialties`";
        $result = $this->db->query($sql);
        return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $e->getMessage();
        return false;
        }
     

    }

}
?>