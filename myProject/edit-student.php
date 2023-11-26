<?php 

   include("php/config.php");

   if(isset($_GET['id'])){
    // Retrieve the value of 'id' from the URL
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM studentinfo WHERE ID = $id";

        $result = mysqli_query($conn, $sql);

        $student = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
    }

    if(isset($_POST['delete'])){
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

        $delete_query = mysqli_query($conn,"DELETE FROM studentinfo WHERE id = $student_id");

        if(!$delete_query){
            // Proceeds to insert the user's information into the database if the registration is successful.
            echo "<div class='message'>
                      <p>Deletion failed!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }else{

            echo "<div class='message'>
                      <p>Record Deleted!</p>
                  </div> <br>";
            echo "<a href='./student.php'><button class='btn'>Go Back</button>";
         
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Edit Student Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="student.php"><button class="btn"><i class="uil uil-arrow-left">Back</i></button></a></p>
        </div>

        <div class="right-links">
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
   <div class="container">
        <div class="box form-box">

        <?php 
         /*** Establish the connection to the database("myproject_login") ***/
         include("php/config.php");

         /*** Check and store values from the form after submission ***/
         if(isset($_POST['update'])){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $studentNum = filter_var($_POST['studentNum'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $courseName = filter_var($_POST['courseName'], FILTER_SANITIZE_STRING);
            $dob = $_POST['dob'];

            $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);



            $sql = "UPDATE studentinfo 
                 SET Name = '$name',
                     StudentNum = '$studentNum',
                     CourseName = '$courseName',
                     Email = '$email',
                     DOB = '$dob'
                WHERE ID = $student_id";

            $update_query = mysqli_query($conn,"UPDATE studentinfo  SET Name = '$name', StudentNum = '$studentNum', CourseName = '$courseName', Email='$email',DOB = '$dob' WHERE ID=$student_id");

         if(!$update_query){
            // Proceeds to insert the user's information into the database if the registration is successful.
            echo "<div class='message'>
                      <p>Update failed!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }else{

            echo "<div class='message'>
                      <p>Update successfull!</p>
                  </div> <br>";
            echo "<a href='./student.php'><button class='btn'>Go Back</button>";
         

         }

         }else{
         
        ?>
            <header>Edit Student Info</header>
            <form action="edit-student.php" method="post">
                <div class="field input">
                    <label for="username">Full Name</label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($student['Name']); ?>">
                </div>
                <div class="field input">
                    <label for="email">Student Number</label>
                    <input type="text" name="studentNum" id="studentNum" value="<?php echo htmlspecialchars($student['StudentNum']); ?>">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($student['Email']); ?>">
                </div>

                <div class="field input">
                    <?php 
                        $sql = 'SELECT CourseName
                            FROM classinfo' ;

                            #4. Make query & get result
                            $result = mysqli_query($conn, $sql);


                            #5. Fetch the resulting rows as an array
                            // Fetch all rows as associative arrays
                            $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            // free result from memory
                            mysqli_free_result($result);
                    ?>
                    <label for="class">Course Name</label>
                    <select name="courseName" id="courseName" value="<?php echo htmlspecialchars($student['CourseName']); ?>">
                            <option>--Select Course Name</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?php echo htmlspecialchars($class['CourseName']); ?>"><?php echo htmlspecialchars($class['CourseName']); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="field input">
                    <label for="dob">DOB</label>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($student['DOB']); ?>">
                </div>

                <div class="field">
                    <input type="hidden" name="student_id" value="<?php echo $student['ID'] ?>">                   
                    <input type="submit" class="btn" name="update" value="Update" required>
                    <input type="submit" class="btn" name="delete" value="Delete" style="background-color: #F75466;">              
                </div>
            </form> 
        </div>
        <?php } ?>
      </div>
</body>
</html>