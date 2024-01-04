<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient En Ligne'</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div id="wrapper">
        <?php include("partials/_sidebar.php"); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("partials/_navbar.php"); ?>
                <div class="container-fluid">

                <!--  button ajouter patient  -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    ajouter patient 
                </button>
                <!-- modal dajout -->

                <!-- start modal -->
                <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Update input fields here -->
        <!-- <form action="">
            <input type="username" placeholder="Full Name">
            <input type="email" placeholder="email">
            <select class="form-select" name="user_type" aria-label="Default select example">
                <option selected>Select User Type</option>
                <option value="1">Patient En Ligne</option>
                <option value="2">Patient En Magasin</option>
            </select>
        </form> -->
        <!-- Form inside Bootstrap Modal -->
<form class="needs-validation" method ="POST" action ="insertpatient">
    <div class="mb-3">
        <label for="username" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your full name" required>
        <div class="invalid-feedback">
            Please enter your full name.
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        <div class="invalid-feedback">
            Please enter a valid email address.
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">pasword</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your email" required>
        <div class="invalid-feedback">
            Please enter a valid password 
        </div>
    </div>
    <div class="mb-3">
        <label for="user_type" class="form-label">User Type</label>
        <select class="form-select" id="user_type" name="user_type" aria-label="Default select example" required>
            <option selected>Select User Type</option>
            <option value="Patient En Ligne">Patient En Ligne</option>
            <option value="Patient En Magasin">Patient En Magasin</option>
        </select>
        <div class="invalid-feedback">
            Please select a user type.
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">add</button>
    </div>
</form>

      </div>

    </div>
  </div>
</div>

                <!-- end modal -->


    <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">user_type</th>
                    <th scope="col">action</th>

                </tr>
                </thead>



    <tbody>
    <?php foreach ($results as $user) { ?>
        <tr>
            <td><?= $user->id?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email?></td>
            <td><?= $user->user_type ?></td>
            <td>
                <!-- add id mdal == upadate -->
                <!-- send id  === #update<//?///= //$user->id?> -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#update<?=$user->id?>" >upadate</button>

                <a href="deletePatient?id=<?=$user->id?>"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">delete</button></a>
        </td>

              
           
        </tr>
        <!-- modal for upadte  -->
        <div class="modal fade" id="update<?=$user->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form class="needs-validation" method ="POST" action ="updatepatient">
    <!-- send if in this input -->
    <input type="hidden" value="<?=$user->id?>" name="id">
    <div class="mb-3">

        <label for="username" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your full name" value="<?=$user->username?>" required>
        <div class="invalid-feedback">
            Please enter your full name.
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?=$user->email?>" required>
        <div class="invalid-feedback">
            Please enter a valid email address.
        </div>
    </div>
   
    <div class="mb-3">
        <label for="user_type" class="form-label">User Type</label>
        <select class="form-select" id="user_type" name="user_type" aria-label="Default select example" required>
            <option selected>Select User Type</option>
            <option value="Patient En Ligne">Patient En Ligne</option>
            <option value="Patient En Magasin">Patient En Magasin</option>
        </select>
        <div class="invalid-feedback">
            Please select a user type.
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">add</button>
    </div>
</form>

      </div>

    </div>
  </div>
</div>
        <?php } ?>
    </tbody>



</table>
                    
                  
                </div>
            </div>
            <?php include("partials/_footer.php"); ?>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>