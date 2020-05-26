<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php';?>

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb flex justify-content-between">
            <li class="breadcrumb-item active" aria-current="page">Library</li>
            <?php if (isAdmin()): ?>
                <a href="<?php echo URLROOT; ?>/books/create" class="btn btn-primary">Create Book</a>
            <?php endif; ?>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="row pb-4 d-flex flex-wrap">
                <?php foreach ($data['books'] as $book) : ?>
                    <div class="col-12 col-lg-3 pb-4">
                        <div class="card h-100">
                            <a style="text-align:center;display:block;" href="<?php echo URLROOT;?>/books/show/<?php echo $book->id;?>">
                                <img class="card-img-top p-3 w-75 mx-auto"
                                     src="<?php echo URLROOT; ?>/img/<?php echo $book->image; ?>"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="mb-2">
                                    <h5 class="card-title"><?php echo $book->name; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $book->isbn; ?></h6>
                                    <p class="card-text"><?php echo $book->description; ?></p>
                                </div>
                                <div>
                                    <form action="<?php if ($book->added) {
                                        echo URLROOT; ?>/users/removeFromFavourites/<?php echo $book->id;
                                    } else {
                                        echo URLROOT; ?>/users/addToFavourites/<?php echo $book->id;
                                    } ?>"
                                          method="post">
                                        <button type="submit" class="btn <?php if ($book->added) {
                                            echo 'btn-danger';
                                        } else {
                                            echo 'btn-warning';
                                        } ?>">
                                            <?php if ($book->added) {
                                                echo 'Remove from Favourites';
                                            } else {
                                                echo 'Add to Favourites';
                                            } ?>
                                        </button>
                                    </form>
                                    <?php if (isAdmin()) : ?>
                                        <div class="d-flex mt-2">
                                            <a href="<?php echo URLROOT; ?>/books/edit/<?php echo $book->id; ?>"
                                               class="btn btn-info mr-2">Edit</a>
                                            <form action="<?php echo URLROOT; ?>/books/delete/<?php echo $book->id; ?>"
                                                  method="post">
                                                <button type="submit" class="btn btn-dark">Delete</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . '/views/inc/footer.php'; ?>
