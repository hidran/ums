<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <a class="navbar-brand" href="#">
            <i class="fa fa-user fa-2x"></i>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"

                data-target="#navbarCollapse" aria-controls="navbarCollapse"

                aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>
        <?php
        $currentUrl = $_SERVER['PHP_SELF'];
        ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">
                <?php

                $activeIndex = (stripos($currentUrl, 'index') && empty($_GET['action']));
                $class = $activeIndex ? 'active' : '';

                ?>
                <li class="nav-item  <?= $class ?>">


                    <a class="nav-link" href="index.php">
                        <i class="fas fa-users"></i> Users
                        <?php if ($activeIndex) { ?>
                            <span class="sr-only">(current)</span>
                        <?php } ?>
                    </a>
                </li>

                <?php
                $activeIndex = (!empty($_GET['action']) && $_GET['action'] === 'insert');
                $class = $activeIndex ? 'active' : '';
                ?>

                <li class="nav-item  <?= $class ?> ">
                    <a class="nav-link" href="updateUser.php?action=insert">
                        <i class="fas fa-user-plus"></i>
                        NEW USER</a>
                </li>

            </ul>

            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <?php
                if(isUserLoggedin()) :
                ?>
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings">
                        <i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1"
                            data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">
                        MY PROFILE <span class="caret"></span></button>

                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                        <li class="nav-item"><?=getUserLoggedInFullname()?></li>
                        <li class="nav-item"><?=getUserEmail()?></li>
                        <li class="px-3 py-2">
                            <form class="form" role="form" method="post" action="verify-login.php">
                               <input type="hidden" name="action" value="logout">
                                <button  class="btn btn-lg btn-outline-primary">LOGOUT</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <?php
                else: ?>
                <li class="nav-item">

                        <a href="login.php" class="btn btn-lg btn-success">LOGIN</a>

                </li>
                <?php
                endif;

                ?>
            </ul>

        </div>

    </nav>

</header>