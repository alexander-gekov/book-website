<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-6 offset-lg-3">
            <form action="<?php echo URLROOT . '/users/login'; ?>" class="shadow-lg p-5 rounded-lg bg-white" method="post">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?>"
                           aria-describedby="emailHelp" placeholder="Enter email">
                    <span><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" value="<?php echo $data['password']; ?>"
                           id="password" name="password" placeholder="Password">
                    <span><?php echo $data['password_err']; ?></span>
                </div>
                <div class="pb-3">
                    Don't have an account? <a href="<?php echo URLROOT;?>/users/register">Register now</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log in</button>
            </form>
        </div>
    </div>
</div>
<?php include APPROOT . '/views/inc/footer.php'; ?>
