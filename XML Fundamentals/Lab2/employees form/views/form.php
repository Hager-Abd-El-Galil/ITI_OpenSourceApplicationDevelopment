<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="d-flex justify-content-center p-5 border bg-white">
            <form method="post" action="index.php">
                <div class="mb-3">
                    <label for="name" class="form-label" hidden>ID</label>
                    <input type="text" class="form-control" name="id" id="id" hidden value="<?php echo $id?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email?>">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone?>">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $address?>">
                </div>

                <div class="mb-3 text-center mt-5">
                    <input type="submit" class="btn btn-primary me-1 rounded-1" name="buttonAction" value="PREV">
                    <input type="submit" class="btn btn-primary me-1 rounded-1" name="buttonAction" value="NEXT">
                    <button name="Insert" class="btn btn-primary" type="button" class="btn btn-primary me-2 ms-2"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Insert</button>
                    <input type="submit" class="btn btn-primary me-1 rounded-1" name="update" value="Update">
                    <input type="submit" class="btn btn-primary me-1 rounded-1" name="buttonAction" value="Delete">
                </div>
            </form>
        </div>
        <div>
            <!--Insert Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form method="POST" action="index.php">
                                    <div class="row form-group m-2">
                                        <div class="col-sm-2">
                                            <label class="control-label"
                                                style="position:relative; top:7px;">Name:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="row form-group  m-2">
                                        <div class="col-sm-2">
                                            <label class="control-label"
                                                style="position:relative; top:7px;">Phone:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="row form-group  m-2">
                                        <div class="col-sm-2">
                                            <label class="control-label"
                                                style="position:relative; top:7px;">Address:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                    <div class="row form-group  m-2">
                                        <div class="col-sm-2">
                                            <label class="control-label"
                                                style="position:relative; top:7px;">Email:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="Insert" class="btn btn-success">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous">
            </script>

</body>

</html>