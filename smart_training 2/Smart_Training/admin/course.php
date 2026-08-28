<?php
include "../Php/connect.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <section id="navigation">
        <?php include "navbar.php"; ?>
    </section>
    <button type="button" class="btn btn-primary btn-lg"><a href="add_course.php">Add Course</a></button>
    <section class="Course">

        <table>
            <tr>
                <th>Name</th>
                <th>Details</th>
                <th>image</th>

                <th>price</th>
                <th id="action_col">Actions</th>


            </tr>

            <?php
            $sql = "SELECT * FROM services";
            $result = mysqli_query($connect, $sql);
            $allservices = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($allservices as $service) {
                $id = $service['id'];
                $name = $service['name'];
                $details = $service['details'];
                $price = $service['price'];
                $image = $service['image'];
                echo "
<tr>

  <td>$name</td>
   <td> $details</td>
   <td>$image</td>

<td>$price</td>
<td>
      <a href='delete_course.php?id=$id' class='btn btn-danger btn-sm me-2'>
        Delete
    </a>

    <a href='update_course.php?id=$id' class='btn btn-primary btn-sm'>
        Update
    </a>
    </td>
</tr>
    ";
            }

            ?>











        </table>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>