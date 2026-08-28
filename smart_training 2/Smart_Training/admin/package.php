<?php
include "../Php/connect.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>packages</title>
</head>

<body>
    <section id="navigation">
        <?php include "navbar.php"; ?>
    </section>
    <button type="button" class="btn btn-primary btn-lg"><a href="add_package.php">Add Package</a></button>
    <section class="instructor">

        <table>
            <tr>
                <th>Name</th>
                <th>Details</th>
                <th>price</th>
                <th id="action_col">Actions</th>


            </tr>


            <?php
            $sql = "SELECT * FROM packages";
            $result = mysqli_query($connect, $sql);
            $allpackages = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($allpackages as $package) {
                $id=$package['id'];
                $name = $package['name'];
                $details = $package['details'];
                $price = $package['price'];
                echo "
            <tr>
            <td>$name</td>
                        <td>$details</td>
                        <td>$price JD</td>
                        <td>
      <a href='delete_package.php?id=$id' class='btn btn-danger btn-sm me-2'>
        Delete
    </a>

    <a href='update_package.php?id=$id' class='btn btn-primary btn-sm'>
        Update
    </a>
    </td>
</tr>
            
            ";
            }

            ?>
        </table>
    </section>




</body>

</html>