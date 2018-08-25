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

                $activeIndex =(stripos($currentUrl,'index') && empty($_GET['action']));
                $class = $activeIndex? 'active' : '';

                ?>
                <li  class="nav-item  <?=$class?>">


                    <a class="nav-link" href="index.php">
                        <i class="fas fa-users"></i> Users
                        <?php if($activeIndex) { ?>
                        <span class="sr-only">(current)</span>
                        <?php } ?>
                    </a>
                </li>

                <?php
                $activeIndex = (!empty($_GET['action']) && $_GET['action'] === 'insert');
                $class = $activeIndex? 'active' : '';
                ?>

                <li class="nav-item  <?=$class?> ">
                    <a class="nav-link" href="index.php?action=insert">
                        <i class="fas fa-user-plus"></i>
                        NEW USER</a>
                </li>
               
            </ul>
            <form class="form-inline mt-2 mt-md-0">

                <input class="form-control mr-sm-2" type="text"

                       placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">

                    Search
                </button>
            </form>
        </div>
    </nav>
</header>