<?php 

    session_start();
    require_once "function.php";
    require_once "conn.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <div class="my-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-uppercase">
                                Register Form
                            </h4>
                            <hr>
                            <?php 
                                    
                                if(isset($_POST['reg'])) {
                                    register();
                                }

                            ?>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name" class="text-primary font-weight-bold">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo old('name') ?>" >
                                    <?php if(getError("name")){ ?>
                                        <small class="text-danger font-weight-bold"><?php echo getError('name') ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-primary font-weight-bold">Your Email</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo old('email') ?>" >
                                    <?php if(getError("email")){ ?>
                                        <small class="text-danger font-weight-bold"><?php echo getError('email') ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="text-primary font-weight-bold">Your Phone</label>
                                    <input type="number" id="phone" name="phone" class="form-control" value="<?php echo old('phone') ?>" >
                                    <?php if(getError("phone")){ ?>
                                        <small class="text-danger font-weight-bold"><?php echo getError('phone') ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="upload" class="text-primary font-weight-bold">Upload Photo</label>
                                    <input type="file" id="upload" name="upload" class="form-control p-1" value="<?php echo old('upload'); ?>" >
                                    <?php if(getError("upload")){ ?>
                                        <small class="text-danger font-weight-bold"><?php echo getError('upload') ?></small>
                                    <?php } ?>
                                </div>
                                <hr>
                                
                                

                                <div class="form-row justify-content-between align-items-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2" checked required>
                                        <label class="custom-control-label" for="customSwitch2">All Correct</label>
                                    </div>
                                    <button name="reg" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php clearError(); ?>
</body> 
</html>