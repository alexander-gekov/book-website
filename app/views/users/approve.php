<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-lg-6 offset-lg-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['users'] as $user) : ?>
                <tr>
                    <th scope="row"><?php echo $user->id;?></th>
                    <td><?php echo $user->fname;?></td>
                    <td><?php echo $user->lname;?></td>
                    <td><?php echo $user->email;?></td>
                    <td>
                        <form action="<?php echo URLROOT;?>/users/approve/<?php echo $user->id;?>" method="post">
                            <button type="submit" class="btn btn-info">Approve</button>
                        </form></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(empty($data['users'])): ?>
            <h2 class="text-center">No more users to approve!</h2>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include APPROOT . '/views/inc/footer.php'; ?>
