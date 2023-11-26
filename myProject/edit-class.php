<?php 

   include("php/config.php");

   if(isset($_GET['id'])){
    // Retrieve the value of 'id' from the URL
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM classinfo WHERE ID = $id";

        $result = mysqli_query($conn, $sql);

        $class = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
    }

    if(isset($_POST['delete'])){
        $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);

        $delete_query = mysqli_query($conn,"DELETE FROM classinfo WHERE id = $class_id");

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
            echo "<a href='./classes.php'><button class='btn'>Go Back</button>";
         
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
    <title>Edit Class info</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="classes.php"><button class="btn"><i class="uil uil-arrow-left">Back</i></button></a></p>
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
            $course_name = filter_var($_POST['course_name'], FILTER_SANITIZE_STRING);
            $course_code = filter_var($_POST['course_code'], FILTER_SANITIZE_STRING);
            $section_num = filter_var($_POST['section_num'], FILTER_SANITIZE_STRING);

            $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);

            $update_query = mysqli_query($conn,"UPDATE classinfo  SET CourseName = '$name', CourseCode = '$course_code', SectionNum = '$section_num' WHERE ID=$class_id");

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
            echo "<a href='./classes.php'><button class='btn'>Go Back</button>";
         

         }

         }else{
         
        ?>
            <header>Edit Class Info</header>
            <form action="edit-student.php" method="post">
                <div class="field input">
                    <label for="name">Course Name</label>
                    <input type="text" name="course_name" id="course_name" value="<?php echo $class['CourseName'] ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="course_code">Course Code</label>
                    <input type="text" name="course_code" id="course_code" value="<?php echo $class['CourseCode'] ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="course_code">Section Number</label>
                    <input type="text" name="section_num" id="section_num" value="<?php echo $class['SectionNum'] ?>" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="hidden" name="class_id" value="<?php echo $class['ID'] ?>">                   
                    <input type="submit" class="btn" name="update" value="Update" required>
                    <input type="submit" class="btn" name="delete" value="Delete" style="background-color: #F75466;">              
                </div>
            </form> 
        </div>
        <?php } ?>
      </div>
</body>
</html>