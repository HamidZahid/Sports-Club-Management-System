 <?php
    include("config.php");
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

     <title>Update Into DataBase</title>
 </head>
 <style>
     body {
         overflow-x: hidden;
     }
 </style>

 <body>
     <?php


        if (isset($_POST['edit_btn'])) {
            $id = $_POST['edit_id'];
            // echo $id;
            $query = "SELECT * FROM bilal WHERE id='$id'";
            $query_run = mysqli_query($conn, $query);

            foreach ($query_run as $row) {
        ?>
             <h2 style="text-align: center; margin-top:20px;">Player Data Update Form</h2>
             <br><br>
             <form action="admin.php" method="POST">
                 <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                 <div class="form-floating mb-3">
                     <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="name@example.com">
                     <label for="floatingInput">First Name</label>
                 </div> <br>
                 <div class="form-floating mb-3">
                     <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="name@example.com">
                     <label for="floatingInput">Last Name</label>
                 </div> <br>
                 <div class="form-floating mb-3">
                     <input type="text" name="address" value="<?php echo $row['company'] ?>" class="form-control" placeholder="name@example.com">
                     <label for="floatingInput">Address</label>
                 </div><br>
                 <div class="form-floating">
                     <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Password">
                     <label for="floatingPassword">Email</label>
                 </div><br>
                 <div class="form-floating">
                     <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Password">
                     <label for="floatingPassword">phone</label>
                 </div><br>
                 <div class="form-floating">
                     <input type="text" name="game" value="<?php echo $row['subject'] ?>" class="form-control" placeholder="Password">
                     <label for="floatingPassword">Game</label>
                 </div><br>
                 <a href="admin.php" class="btn btn-dark" style="margin-left: 50px;">Cancel</a>
                 <button type="submit" name="updatebtn" class="btn btn-warning" style="margin-left: 50px;">Update</button>
             </form>
     <?php
            }
        }
        ?>

 </body>

 </html>