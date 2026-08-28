<?php
include "../Php/connect.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <section id="navigation">
        <?php include "navbar.php"; ?>
    </section>
    <button type="button" class="btn btn-primary btn-lg"><a href="add_instructor.php">Add instructor</a></button>
    <section class="instructor">

        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Details</th>
                <th>imglink</th>

                <th id="action_col">Actions</th>


            </tr>

            <?php
            $sql = "SELECT * FROM instructors";
            $result = mysqli_query($connect, $sql);
            $allinstructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($allinstructors as $instructor) {
                $id = $instructor['id'];
                $name = $instructor['name'];
                $role = $instructor['role'];
                $details = $instructor['details'];
$imglink=$instructor['image'];
                echo "
<tr>

  <td>$name</td>
   <td> $role</td>
<td>$details</td>
<td>$imglink</td>
<td>
      <a href='delete_instructor.php?id=$id' class='btn btn-danger btn-sm me-2'>
        Delete
    </a>

    <a href='update_instructor.php?id=$id' class='btn btn-primary btn-sm'>
        Update
    </a>
    </td>
</tr>
    ";
            }

            ?>










    </table>
    <!-- //close table after loop -->
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>