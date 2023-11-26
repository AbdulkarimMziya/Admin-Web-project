<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Add Class Information</title>
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
         if(isset($_POST['submit'])){
            $course_name = filter_var($_POST['course_name'], FILTER_SANITIZE_STRING);
            $course_code = filter_var($_POST['course_code'], FILTER_SANITIZE_STRING);
            $section_num = filter_var($_POST['section_num'], FILTER_SANITIZE_STRING);
            

         // Check if the email exists.
         $sql = "INSERT INTO classinfo (CourseName,CourseCode,SectionNum) 
                    VALUES('$course_name','$course_code','$section_num')";

         if(!mysqli_query($conn, $sql)){
            // Proceeds to insert the user's information into the database if the registration is successful.
            echo "<div class='message'>
                      <p>Registration failed!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }else{

            echo "<div class='message'>
                      <p>Class added!</p>
                  </div> <br>";
            echo "<a href='./classes.php'><button class='btn'>Go Back</button>";
         

         }

         }else{
         
        ?>
            <header>Add Course Info</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="name">Course Name</label>
                    <input type="text" name="course_name" id="course_name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="course_code">Course Code</label>
                    <input type="text" name="course_code" id="course_code" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="course_code">Section Number</label>
                    <input type="text" name="section_num" id="section_num" autocomplete="off" required>
                </div>

                <div class="field">                   
                    <input type="submit" class="btn" name="submit" value="Add" required>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>