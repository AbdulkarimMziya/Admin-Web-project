<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Add Student Information</title>
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
         if(isset($_POST['submit'])){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $studentNum = filter_var($_POST['studentNum'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $courseName = filter_var($_POST['courseName'], FILTER_SANITIZE_STRING);
            $dob = $_POST['dob'];



         // Check if the email exists.
         $sql = "INSERT INTO studentinfo (Name,StudentNum,CourseName,Email,DOB) 
                    VALUES('$name','$studentNum','$courseName','$email','$dob')";

         if(!mysqli_query($conn, $sql)){
            // Proceeds to insert the user's information into the database if the registration is successful.
            echo "<div class='message'>
                      <p>Registration failed!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        }else{

            echo "<div class='message'>
                      <p>Registration successfull!</p>
                  </div> <br>";
            echo "<a href='./student.php'><button class='btn'>Go Back</button>";
         

         }

         }else{
         
        ?>
            <header>Add Student Info</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Full Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Student Number</label>
                    <input type="text" name="studentNum" id="studentNum" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
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
                    <select name="courseName" id="courseName">
                            <option value="">--Select Course Name</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?php echo htmlspecialchars($class['CourseName']); ?>"><?php echo htmlspecialchars($class['CourseName']); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="field input">
                    <label for="dob">DOB</label>
                    <input type="date" name="dob" id="dob" required>
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