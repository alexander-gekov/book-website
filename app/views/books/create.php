<?php include APPROOT . '/views/inc/header.php'?>
<?php include APPROOT . '/views/inc/nav.php' ?>
<div class="container">
    <div class="row mx-auto my-4">
        <div class="col-6 offset-3">
            <form action="<?php echo URLROOT . '/books/create'; ?>" enctype="multipart/form-data"
                  class="shadow-lg p-5 rounded-lg bg-white" method="post">
                <a href="<?php echo URLROOT;?>/books" class="btn btn-secondary">Back</a>
                <h2 class="text-center">Add a book</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name']; ?>"
                           placeholder="Book Name">
                    <span><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" value="<?php echo $data['isbn']; ?>"
                           placeholder="ISBN">
                    <span><?php echo $data['isbn_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                           value="<?php echo $data['description']; ?>"
                           placeholder="Description">
                    <span><?php echo $data['description_err']; ?></span>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <span><?php echo $data['image_err']; ?></span>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>
    </div>
</div>

<?php include APPROOT . '/views/inc/footer.php' ?>

