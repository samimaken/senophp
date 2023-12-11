<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <div class="container p-md-5">
        <div class="row mt-5">
            <div class="col-md-5 col-12 mt-5 ms-auto me-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (error()) :
                        ?>
                            <div class="alert alert-danger p-1"><?= error() ?></div>
                        <?php endif ?>
                        <form method="post" action="login-submit">
                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email">
                                <?php
                                if (input_error('email')) :
                                ?>
                                    <span class="text-danger"><?= input_error('email') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password">
                                <?php
                                if (input_error('password')) :
                                ?>
                                    <span class="text-danger"><?= input_error('password') ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary btn-sm" name="login">Login</button>
                            </div>
                            Not have a account ? <a href="register">Register</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>