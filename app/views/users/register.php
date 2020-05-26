<?php include APPROOT . '/views/inc/header.php'?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<!--    <div class="wrapper form-wrapper">-->
<!--        <h2>Register</h2>-->
<!--        <form name="registerForm" id="registerForm" action="--><?php //echo URLROOT . '/users/register'; ?><!--" method="post">-->
<!--            <div>-->
<!--                <p>-->
<!--                    <label for="fname"><b>Name: </b><sup>*</sup></label>-->
<!--                    <input type="text" name="fname" id="fname" value="--><?php //echo $data['fname']; ?><!--">-->
<!--                    <span name="fname_err">--><?php //echo $data['fname_err'] ?><!--</span>-->
<!--                </p>-->
<!--            </div>-->
<!--            <div>-->
<!--              <p>-->
<!--                <label for="username"><b>Username: </b><sup>*</sup></label>-->
<!--                <input type="text" name="username" id="registerUsername" value="--><?php //echo $data['username']; ?><!--">-->
<!--                <span name="username_err">--><?php //echo $data['username_err'] ?><!--</span>-->
<!--              </p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <p>-->
<!--                    <label for="email"><b>Email: </b><sup>*</sup></label>-->
<!--                    <input type="text" name="email" id="registerEmail" value="--><?php //echo $data['email']; ?><!--">-->
<!--                    <span name="email_err">--><?php //echo $data['email_err'] ?><!--</span>-->
<!--                </p>-->
<!--            </div>-->
<!--            <div>-->
<!--              <p>-->
<!--                  <label for="password"><b>Password: </b><sup>*</sup></label>-->
<!--                  <input type="password" name="password" id="registerPassword" value="--><?php //echo $data['password']; ?><!--">-->
<!--                  <span>--><?php //echo $data['password_err']; ?><!--</span>-->
<!--              </p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <p>-->
<!--                 <label for="confirm_password"><b>Confirm Password: </b><sup>*</sup></label>-->
<!--                <input type="password" name="confirm_password" id="registerConfirmPassword" value="--><?php //echo $data['confirm_password']; ?><!--">-->
<!--               <span>--><?php //echo $data['confirm_password_err'];?><!--</span>-->
<!--              </p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <input type="submit" class="button-black" name="Submit" id="btnSubmit" value="Submit">-->
<!--                <input type="reset" class="button-black" value="Clear">-->
<!--            </div>-->
<!--            <p>Already have an account? <a href="--><?php //echo URLROOT ?><!--/users/login">Login here</a>.</p>-->
<!--        </form>-->
<!--    </div>-->
<div class="container">
    <div class="row mx-auto my-4">
        <div class="col-6 offset-3">
            <form action="<?php echo URLROOT . '/users/register'; ?>" class="shadow-lg p-5 rounded-lg bg-white" method="post">
                <h2 class="text-center">Register</h2>
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $data['fname']; ?>"
                           placeholder="First Name">
                    <span><?php echo $data['fname_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $data['lname']; ?>"
                           placeholder="Last Name">
                    <span><?php echo $data['lname_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?>"
                           aria-describedby="emailHelp" placeholder="Enter email">
                    <span><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" value="<?php echo $data['password']; ?>"
                           name="password" id="password" placeholder="Password">
                    <span><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" value="<?php echo $data['confirm_password']; ?>"
                           name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <span><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="p-2">
                    Already have an account? <a href="<?php echo URLROOT;?>/users/login">Login</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>

<?php include APPROOT . '/views/inc/footer.php' ?>

