<?php include APPROOT . '/views/inc/header.php' ?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb flex justify-content-between">
            <li class="breadcrumb-item active" aria-current="page">My Favourites</li>
        </ol>
    </nav>
<!--    <div class="row">-->
<!--        <div class="col-12 col-lg-3 pb-4">-->
<!--            <div class="card w-100" style="position: sticky; top:10px;">-->
<!--                <div class="card-header">-->
<!--                    Featured-->
<!--                </div>-->
<!--                <ul class="list-group list-group-flush">-->
<!--                    <li class="list-group-item">Latest</li>-->
<!--                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                    <li class="list-group-item">Vestibulum at eros</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-12">
            <div class="row pb-4 d-flex flex-wrap">
                <?php if(empty($data['my_books'])) : ?>
                <div class="alert alert-dark" role="alert">
                    You can add books to your favorites lists from <a href="<?php echo URLROOT;?>/books">here</a>.
                </div>
                <?php endif; ?>
                <?php foreach ($data['my_books'] as $book) : ?>
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
                                <form action="<?php echo URLROOT; ?>/users/removeFromFavourites/<?php echo $book->id; ?>"
                                      method="post">
                                    <button type="submit" class="btn btn-danger">Remove from Favourites</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . '/views/inc/footer.php'; ?>
