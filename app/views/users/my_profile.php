<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div x-data="
            {
                 fname: '<?php echo $data['user']->fname ?>',
                 newFname: null,
                 lname: '<?php echo $data['user']->lname ?>',
                 newLname: null,
                 email: '<?php echo $data['user']->email ?>',
                 newEmail: null,
                 pass: '',
                 newPass: null,
                 showPassword: false,
                 isEditing: false,
                 edit: function() {
                    this.isEditing = true;
                 },
                 save: function() {
                    this.origText = this.newText;
                    this.fname = this.newFname;
                    this.lname = this.newLname;
                    this.email = this.newEmail;
                    this.pass = this.newPass;
                    this.isEditing = false;
                 },
                 cancel: function() {
                    this.newFname = this.fname;
                    this.newLname = this.lname;
                    this.newEmail = this.email;
                    this.newPass = this.pass;
                    this.isEditing = false;
                 },
            }
         " x-init="newFname = fname; newLname = lname; newEmail = email; newPass = pass;" class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-6 offset-lg-3">
            <div class="card w-100">
                <h3 class="text-center pt-4">My Profile</h3>
                <div class="card-body">
                    <div class="fname d-flex">
                        <h5 class="card-title pr-2">First Name:</h5>
                        <div x-show=!isEditing>
                            <h5 id="fname" class="card-title" x-text="newFname"></h5>
                        </div>

                        <label x-show="isEditing">
                            <div class="d-flex mb-2">
                                <input type="text" x-ref="textInput" class="p-2 border" x-model="newFname">
                            </div>
                        </label>
                    </div>
                    <div class="lname d-flex">
                        <h5 class="card-title pr-2">Last Name:</h5>
                        <div x-show=!isEditing>
                            <h5 id="lname" class="card-title" x-text="newLname"></h5>
                        </div>

                        <label x-show="isEditing">
                            <div class="d-flex mb-2">
                                <input type="text" x-ref="textInput" class="p-2 border" x-model="newLname">
                            </div>
                        </label>
                    </div>
                    <div class="email d-flex">
                        <h5 class="card-title pr-2">Email:</h5>
                        <div x-show=!isEditing>
                            <h5 id="email" class="card-title" x-text="newEmail"></h5>
                        </div>

                        <label x-show="isEditing">
                            <div class="d-flex mb-2">
                                <input type="text" x-ref="textInput" class="p-2 border" x-model="newEmail">
                            </div>
                        </label>
                    </div>
                    <div x-show="isEditing">
                        <div class="d-flex">
                            <h5 class="card-title pr-2">New Password:</h5>
                            <label>
                                <div class="d-flex mb-2">
                                    <input id="pass" type="password" x-ref="textInput" class="p-2 border" x-model="newPass">
                                </div>
                            </label>
                        </div>
                    </div>
                    <button x-show="!isEditing" type="button" class="btn btn-info" @click="edit();">Edit</button>
                    <div x-show="isEditing">
                        <div class="d-flex">
                            <button type="button" class="btn btn-secondary mr-2" title="Cancel" @click="cancel">Cancel</button>
                            <form action="<?php echo URLROOT;?>/users/edit/<?php echo $_SESSION['user_id']?>" method="post">
                                <input x-show="false" name="fname" type="text" x-ref="textInput" class="p-2 border" x-model="newFname">
                                <input x-show="false" name="lname" type="text" x-ref="textInput" class="p-2 border" x-model="newLname">
                                <input x-show="false" name="email" type="text" x-ref="textInput" class="p-2 border" x-model="newEmail">
                                <input x-show="false" name="pass" type="password" x-ref="textInput" class="p-2 border" x-model="newPass">
                                <button type="submit" class="btn btn-secondary" title="Save" >Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . '/views/inc/footer.php'; ?>
