<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb flex justify-content-between">
            <li class="breadcrumb-item active" aria-current="page">Book <?php echo $data['book']->id; ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 col-lg-5 border-right">
            <img class="card-img-top p-3 w-50"
                 src="<?php echo URLROOT; ?>/img/<?php echo $data['book']->image; ?>"
                 alt="Card image cap">
        </div>
        <div class="col-auto col-lg-7">
            <div class="card border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-start">
                    <div class="mb-2">
                        <h5 class="card-title"><?php echo $data['book']->name; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['book']->isbn; ?></h6>
                        <p class="card-text"><?php echo $data['book']->description; ?></p>
                    </div>
                    <div>
                        <form action="<?php if ($data['book']->added) {
                            echo URLROOT; ?>/users/removeFromFavourites/<?php echo $data['book']->id;
                        } else {
                            echo URLROOT; ?>/users/addToFavourites/<?php echo $data['book']->id;
                        } ?>"
                              method="post">
                            <button type="submit" class="btn <?php if ($data['book']->added) {
                                echo 'btn-danger';
                            } else {
                                echo 'btn-warning';
                            } ?>">
                                <?php if ($data['book']->added) {
                                    echo 'Remove from Favourites';
                                } else {
                                    echo 'Add to Favourites';
                                } ?>
                            </button>
                        </form>
                        <?php if (isAdmin()) : ?>
                            <div class="d-flex mt-2">
                                <a href="<?php echo URLROOT; ?>/books/edit/<?php echo $data['book']->id; ?>"
                                   class="btn btn-info mr-2">Edit</a>
                                <form action="<?php echo URLROOT; ?>/books/delete/<?php echo $data['book']->id; ?>"
                                      method="post">
                                    <button type="submit" class="btn btn-dark">Delete</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include APPROOT . '/views/inc/footer.php'; ?>
