-- Smart Training database
-- Import this file in phpMyAdmin (XAMPP) to create the database with sample data.
-- Demo accounts:
--   admin@smarttraining.com   / admin123    (admin dashboard)
--   student@smarttraining.com / student123  (normal student)

CREATE DATABASE IF NOT EXISTS smart_training;
USE smart_training;

-- users (students and admins)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    country VARCHAR(50),
    city VARCHAR(50),
    DOB DATE,
    gender VARCHAR(10),
    role VARCHAR(10) NOT NULL DEFAULT 'user'
);

-- courses
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    details TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100),
    details TEXT,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    details TEXT,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS course_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    stime TIME NOT NULL,
    etime TIME NOT NULL,
    day VARCHAR(10) NOT NULL
);

-- each row is either a course or a package in a user's cart
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NULL,
    course_price DECIMAL(10, 2) NULL,
    package_name VARCHAR(100) NULL,
    package_price DECIMAL(10, 2) NULL,
    user_email VARCHAR(100) NOT NULL
);

INSERT INTO users (fname, lname, email, password, phone, country, city, DOB, gender, role) VALUES
('Admin', 'User', 'admin@smarttraining.com', 'admin123', '0790000000', 'Jordan', 'Amman', '2000-01-01', 'female', 'admin'),
('Demo', 'Student', 'student@smarttraining.com', 'student123', '0791111111', 'Jordan', 'Amman', '2004-05-10', 'male', 'user');

INSERT INTO services (name, details, price, image) VALUES
('Web Development', 'Build responsive websites with HTML, CSS, JavaScript and PHP, from your first page to a full database-driven site.', 150, '../assets/course1.jpg'),
('Data Analysis', 'Clean, analyze and visualize data using Excel, SQL and Power BI dashboards.', 180, '../assets/course2.jpg'),
('Cybersecurity', 'Learn network security, common attacks and how to defend against them through hands-on labs.', 200, '../assets/course3.jpg'),
('Cloud Computing', 'Understand cloud services, storage and deployment, and launch your own app in the cloud.', 190, '../assets/course4.jpg'),
('Software Engineering', 'Programming fundamentals, object-oriented design, Git and working in a development team.', 170, '../assets/course6.jpg'),
('Personal Career Mentoring', 'One-to-one sessions on your CV, interviews and planning the next step in your career.', 90, '../assets/course6.avif');

INSERT INTO instructors (name, role, details, image) VALUES
('Dr. Michael Harris', 'Data Analysis Instructor', '15 years teaching statistics and data analysis for business.', '../assets/instructor1.jpg'),
('Dr. James Carter', 'Web Development Instructor', 'Full-stack developer who has built websites for companies across the region.', '../assets/instructor2.png'),
('Prof. Robert Miller', 'Cybersecurity Instructor', 'Security researcher focused on network defense and ethical hacking.', '../assets/instructor3.webp'),
('Sarah Mitchell', 'Career Mentor', 'Helps students prepare CVs, practice interviews and find their path.', '../assets/instructor4.jpg'),
('Eng. Lina Haddad', 'Cloud Computing Instructor', 'Certified cloud engineer with experience deploying large systems.', '../assets/instructor5.jpg'),
('Eng. Noor Khalil', 'Software Engineering Instructor', 'Software engineer passionate about clean code and teamwork.', '../assets/instructor6.jpg');

INSERT INTO packages (name, details, price) VALUES
('Starter Package', 'Any 2 courses of your choice plus access to online learning resources.', 280),
('Professional Package', 'Any 4 courses, certification preparation and workshop access.', 520),
('Career Track', 'All courses plus personal career mentoring until you land your first job.', 750);

INSERT INTO course_schedule (name, stime, etime, day) VALUES
('Web Development', '09:00', '11:00', 'Monday'),
('Data Analysis', '11:30', '13:30', 'Monday'),
('Cybersecurity', '09:00', '11:00', 'Tuesday'),
('Cloud Computing', '14:00', '16:00', 'Tuesday'),
('Software Engineering', '11:30', '13:30', 'Wednesday'),
('Web Development', '09:00', '11:00', 'Thursday'),
('Data Analysis', '14:00', '16:00', 'Thursday'),
('Personal Career Mentoring', '17:00', '19:00', 'Saturday'),
('Cybersecurity', '11:30', '13:30', 'Sunday'),
('Cloud Computing', '17:00', '19:00', 'Sunday');
