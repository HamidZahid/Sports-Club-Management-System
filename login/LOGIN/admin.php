<?php
include("config.php");
$query = "SELECT * FROM bilal";
$query_run = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Panel</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-danger">

        <div class="container-fluid">
            <a class="navbar-brand">Muhammad Bilal Tahir (Admin)</a>
            <form class="d-flex">


            </form>
        </div>
    </nav>

    <table class="table">
        <thead class="table-warning">

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Area Code</th>
                <th>Phone Number</th>
                <th>Game Option</th>
                <th>Exist</th>
                <th>Edit/Update</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['company'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['area_code'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['subject'] ?></td>
                        <td><?php echo $row['exist'] ?></td>
                        <td>
                            <form action="edit.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="edit_btn" class="btn btn-danger">Edit/Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="delete_btn" class="btn btn-success">Delete</button>
                            </form>
                        </td>
                    </tr>

            <?php
                }
            } else {
                // echo "no record Found";
            }

            ?>





            <?php
            if (isset($_POST['updatebtn'])) {
                $id = $_POST['edit_id'];
                $fname = $_POST['first_name'];
                $sname = $_POST['last_name'];
                $f_address = $_POST['address'];
                $f_email = $_POST['email'];
                $f_phone = $_POST['phone'];
                $f_game = $_POST['game'];

                $query = "UPDATE bilal SET first_name='$fname', last_name='$sname', company='$f_address', email='$f_email', phone='$f_phone', subject='$f_game'  WHERE id='$id' ";
                $query_run = mysqli_query($conn, $query);

                if ($query_run) {
                    // header('location: admin.php');
                } else {
                    // echo "Data Update Failed";
                }
            }


            if (isset($_POST['delete_btn'])) {

                $id = $_POST['delete_id'];

                $query = "DELETE FROM bilal WHERE id='$id'";
                $query_run = mysqli_query($conn, $query);
            }














            ?>

        </tbody>
    </table>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>





<!-- <button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>

<button type="button" class="btn btn-link">Link</button> -->