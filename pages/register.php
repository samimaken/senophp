<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Register</title>
</head>

<body>
    <div class="container p-md-5">
        <div class="row mt-5">
            <div class="col-md-5 col-12 mt-5 ms-auto me-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Register</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (errorFlush()) :
                        ?>
                            <div class="alert alert-danger p-1"><?= errorFlushShow() ?></div>
                        <?php endif ?>
                        <form method="post" action="register-submit">
                            <div class="form-group mb-2">
                                <label>Name</label>
                                <input class="form-control" name="name" type="text">
                                <?php
                                if (error('name')) :
                                ?>
                                    <span class="text-danger"><?= errorShow('name') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email">
                                <?php
                                if (error('email')) :
                                ?>
                                    <span class="text-danger"><?= errorShow('email') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password">
                                <?php
                                if (error('password')) :
                                ?>
                                    <span class="text-danger"><?= errorShow('password') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-2">
                                <label>Confirm Password</label>
                                <input class="form-control" name="password_confirmation" type="password">
                              
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary btn-sm" name="register">Register</button>
                            </div>
                            Already have a account ? <a href="login">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>