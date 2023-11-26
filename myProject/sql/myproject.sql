
------------------------------------------------------------------------------------
-- Table for admin/users
------------------------------------------------------------------------------------
-- Table for admin/users
CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Password varchar(200)
);
------------------------------------------------------------------------------------
-- Table for studentinfo
------------------------------------------------------------------------------------
CREATE TABLE `studentinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `StudentNum` varchar(255) NOT NULL,
  `CourseName` varchar(250) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
------------------------------------------------------------------------------------
-- Table for classinfo
------------------------------------------------------------------------------------
CREATE TABLE `classinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(255) NOT NULL,
  `CourseCode` varchar(255) NOT NULL,
  `SectionNum` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
------------------------------------------------------------------------------------
------------------------------------------------------------------------------------

------------------------------------------------------------------------------------
        -- Inserting data into the classinfo table
------------------------------------------------------------------------------------
INSERT INTO `classinfo` (`CourseName`, `CourseCode`, `SectionNum`)
VALUES
('Mathematics', 'MATH101', 1),
('English Literature', 'ENGL201', 2),
('Computer Science', 'COMP301', 3),
('Physics', 'PHYS101', 1),
('History', 'HIST201', 2),
('Chemistry', 'CHEM301', 3),
('Biology', 'BIOL401', 4),
('Economics', 'ECON501', 5);
---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------
------------------------------------------------------------------------------------
        -- Inserting data into the student table
------------------------------------------------------------------------------------
INSERT INTO `studentinfo` (`Name`, `StudentNum`, `CourseName`, `DOB`, `Email`, `RegDate`)
VALUES
('John Doe', 'S001', 'Mathematics', '2000-01-15', 'john.doe@example.com', '2023-01-01'),
('Jane Smith', 'S002', 'English Literature', '1999-05-22', 'jane.smith@example.com', '2023-01-02'),
('Bob Johnson', 'S003', 'Computer Science', '2001-03-10', 'bob.johnson@example.com', '2023-01-03'),
('Alice Williams', 'S004', 'Physics', '2000-09-05', 'alice.williams@example.com', '2023-01-04'),
('Charlie Brown', 'S005', 'History', '1999-11-30', 'charlie.brown@example.com', '2023-01-05'),
('Emily Davis', 'S006', 'Chemistry', '2001-07-18', 'emily.davis@example.com', '2023-01-06'),
('David Lee', 'S007', 'Biology', '2000-04-03', 'david.lee@example.com', '2023-01-07'),
('Grace Martin', 'S008', 'Economics', '1999-08-20', 'grace.martin@example.com', '2023-01-08'),
('Samuel White', 'S009', 'Physics', '2001-01-25', 'samuel.white@example.com', '2023-01-09'),
('Olivia Harris', 'S010', 'History', '2000-06-12', 'olivia.harris@example.com', '2023-01-10'),
('Daniel Wilson', 'S011', 'Mathematics', '1999-02-08', 'daniel.wilson@example.com', '2023-01-11'),
('Sophia Turner', 'S012', 'Mathematics', '2000-10-17', 'sophia.turner@example.com', '2023-01-12'),
('Liam Adams', 'S013', 'English Literature', '1999-12-01', 'liam.adams@example.com', '2023-01-13'),
('Ava Parker', 'S014', 'Computer Science', '2001-06-24', 'ava.parker@example.com', '2023-01-14'),
('Noah Mitchell', 'S015', 'Physics', '2000-03-09', 'noah.mitchell@example.com', '2023-01-15'),
('Mia Allen', 'S016', 'History', '1999-09-14', 'mia.allen@example.com', '2023-01-16'),
('Jackson Scott', 'S017', 'Chemistry', '2001-02-28', 'jackson.scott@example.com', '2023-01-17'),
('Emma Baker', 'S018', 'Biology', '2000-07-07', 'emma.baker@example.com', '2023-01-18'),
('Logan Taylor', 'S019', 'Economics', '1999-04-23', 'logan.taylor@example.com', '2023-01-19'),
('Grace Lewis', 'S020', 'Psychology', '2001-11-10', 'grace.lewis@example.com', '2023-01-20');














