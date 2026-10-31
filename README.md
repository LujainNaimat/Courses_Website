# Smart Training Institute

A training center website where students can browse courses, see the weekly schedule, enroll in courses or packages, and pay from their cart. Admins get a dashboard to add, update and delete courses, packages, instructors and schedule time slots.

**Live demo:** https://lujainnaimat.github.io/Courses_Website/

## Try the demo

| Account | Email | Password |
|---|---|---|
| Student | student@smarttraining.com | student123 |
| Admin | admin@smarttraining.com | admin123 |

The sign-in page has buttons that fill these in for you. You can also create your own account from the sign-up page.

The live demo is a front-end version of the project (HTML, CSS and JavaScript) so it can run on GitHub Pages, which does not support PHP or MySQL. Instead of a database, the demo saves its data in your browser, so anything you add or change only affects your own copy. Use "Reset data" at the bottom of any page to go back to the original sample data.

## Features

**Students**
- Sign up and sign in
- Browse courses and training packages
- Weekly course schedule built from the database
- Add courses and packages to a cart, remove them, and see the total price
- Pay and view "My Courses"

**Admin dashboard**
- Add, update and delete courses
- Add, update and delete packages
- Add, update and delete instructors
- Add, update and delete schedule time slots (checks that the end time is after the start time)
- Only admin accounts can open the dashboard

## Built with

- PHP (procedural, mysqli)
- MySQL
- HTML, CSS, JavaScript
- Bootstrap (admin tables)
- XAMPP for local development

## Run the full PHP version locally

1. Install [XAMPP](https://www.apachefriends.org/) and start Apache and MySQL.
2. Copy the `Smart_Training` folder (inside `smart_training 2/`) into `xampp/htdocs/`.
3. Open phpMyAdmin and import `Smart_Training/database/smart_training.sql`. This creates the `smart_training` database with sample data and the demo accounts above.
4. Check the connection settings in `Smart_Training/Php/connect.php`. It uses MySQL on port `3307`; if your XAMPP MySQL runs on the default port, change `localhost:3307` to `localhost`.
5. Open http://localhost/Smart_Training/Php/index.php

## Project structure

```
smart_training 2/Smart_Training/   Full PHP + MySQL version
    Php/        Student pages (home, courses, schedule, packages, cart, sign in/up)
    admin/      Admin dashboard (add / update / delete pages for each table)
    css/        Stylesheets
    Javascript/ Menu, social links and payment confirmation
    assets/     Images and the home page video
    database/   SQL file to create the database
docs/                              Static demo published on GitHub Pages
```

## Database tables

| Table | Stores |
|---|---|
| users | Students and admins (role column) |
| services | Courses |
| packages | Course packages |
| instructors | Instructors shown on the home page |
| course_schedule | Weekly time slots for each course |
| orders | Courses and packages in each user's cart |

## Author

Lujain Naimat
