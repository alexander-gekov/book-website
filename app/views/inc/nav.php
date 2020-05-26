<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>">Book Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
                <?php if (isLoggedIn()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>">Home <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <?php if (isAdmin()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/users/show">Approve Users</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (isLoggedIn()) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if (isAdmin()) {
                                echo $_SESSION['user_name'] . ' (Admin)';
                            } else {
                                echo $_SESSION['user_name'];
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['user_id']; ?>">My
                                Profile</a>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/my_books">My Favourites</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
