<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Medi Express</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include("partials/_sidebar.php"); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("partials/_navbar.php"); ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Team</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-success m-0 fw-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                            <table class="table mt-4" id="dataTable">
                                <thead>
                                    <tr>			
                                        <th class="text-center">Name Patient</th>
                                        <th class="text-center">Email Patient</th>
                                        <th class="text-center">Name Medicament</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">sale type </th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($d_vent as $rows) { ?>
                                        <tr>
                                            <td class="text-center"><?= $rows->username ?></td>
                                            <td class="text-center"><?= $rows->email ?></td>
                                            <td class="text-center"><?= $rows->name ?></td>
                                            <td class="text-center"><?= $rows->price ?></td>
                                            <td class="text-center"><?= $rows->quantity ?></td>
                                            <td class="text-center"><?= $rows->sale_type ?></td>
                                            <td class="text-center"><?= $rows->date ?></td>
                                        </tr>            
                                    <?php } ?>
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("partials/_footer.php"); ?>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    
</body>

</html>