<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style/style1.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Student Panel</title>
</head>
<body>
<nav>
    <?php 
            
        $id = $_SESSION['id'];
        $query = mysqli_query($conn,"SELECT*FROM users WHERE Id=$id");

        while($result = mysqli_fetch_assoc($query)){
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_id = $result['Id'];
        }
    ?>
        <div class="logo">               
            <div class="logo-image">             
               <img src="images/logo.png" alt=""> <!--- Add user image or Initials --->
            </div>
            <span class="logo_name"><?php echo htmlspecialchars($res_Uname) ?></span> <!--- Add user name --->
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="home.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-book-reader"></i>
                    <span class="link-name">Students</span>
                </a></li>
                <li><a href="classes.php">
                    <i class="uil uil-book-open"></i>
                    <span class="link-name">Classes</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                 <li class="settings">
                    <?php echo "<a href='edit.php?Id=$res_id'>"; ?>
                        <i class="uil uil-setting"></i>
                    <span class="link-name">Settings</span>
                </a>
            </li>
                <li> <a href="php/logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
</nav>
     <!------------------------------------------------------------------------------------ ^^^ HEADER + NAVIGATION ^^^ ------->
<?php
    #3. Write query for all pizzas
    $sql = 'SELECT *
    FROM studentinfo 
         ORDER BY RegDate DESC';

    #4. Make query & get result
    $result = mysqli_query($conn, $sql);


    #5. Fetch the resulting rows as an array
    // Fetch all rows as associative arrays
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $total = mysqli_num_rows($result);
    // echo "<span class="number"> {$total} </span>";


    // free result from memory
    mysqli_free_result($result);

?>


    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--profile image-->
            <span class="profile-image"><i class="uil uil-user-circle"></i></span>
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Students</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-arrow-growth"></i>
                        <span class="text">Total students</span> 
                        <span class="number"><?php echo $total; ?></span> 
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <!--- direct to add-student.php --->
                    <span class="text">Add Student Info</span>
                    <a href="#"><i class="uil uil-plus" style="background-color: #65ED61;"></i></a>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['Name']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data type">
                        <span class="data-title">Student Number</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['StudentNum']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data dob">
                        <span class="data-title">Date of birth</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['DOB']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['Email']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data program">
                        <span class="data-title">Class</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['CourseName']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data joined">
                        <span class="data-title">Registration Date</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list"><?php echo htmlspecialchars($student['RegDate']); ?></span>
                        <?php endforeach; ?> 
                    </div>
                    <div class="data action"> 
                        <span class="data-title">Action</span>
                        <?php foreach ($students as $student) : ?>
                        <span class="data-list">
                            <a href="edit-student.php?id=<?php echo $student['ID'] ?>"><i class="uil uil-edit"></i></a>
                        </span><!-- direct to edit-student.php form -->
                        <?php endforeach; ?> 
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <script src="script/script.js"></script>
</body>
</html>