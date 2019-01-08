<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark  bg-dark justify-content-center">

            <form class="form-inline mt-2 mt-md-0" method="get" action="<?= $pageUrl ?>" id="searchForm">
                <input type="hidden" name="page" id="page" value="<?=$page?>">
                <div class="form-group">
                    <label for="orderBy">ORDER BY</label>

                    <select name="orderBy" class="form-control"
                            id="orderBy"

                            onchange="document.forms.searchForm.submit()">


                        <option value="">SELECT</option>
                        <?php
                        foreach ($orderByColumns as $val) {
                            ?>
                            <option <?= $orderBy == $val ? 'selected' : '' ?> value="<?= $val ?>"><?= $val ?></option>


                        <?php } ?>
                    </select>
                </div>&nbsp;

                <div class="form-group">
                    <label for="orderDir">ORDER</label>

                    <select name="orderDir" class="form-control"
                            id="orderDir"

                            onchange="document.forms.searchForm.submit()">
                        <option <?= $orderDir == 'ASC' ? 'selected' : '' ?> value="ASC">ASC</option>
                        <option <?= $orderDir == 'DESC' ? 'selected' : '' ?> value="DESC">DESC</option>


                    </select>
                </div>&nbsp;
                <div class="form-group">
                    <label for="recordsPerPage">RECORDS</label>

                    <select name="recordsPerPage" class="form-control"
                            id="recordsPerPage"

                            onchange="document.forms.searchForm.page.value=1;document.forms.searchForm.submit()">


                        <option value="">SELECT</option>
                        <?php
                        foreach ($recordsPerPageOptions as $val) {
                            ?>
                            <option <?= $recordsPerPage == $val ? 'selected' : '' ?>
                                    value="<?= $val ?>"><?= $val ?></option>


                        <?php } ?>
                    </select>
                </div>&nbsp;
                <input class="form-control mr-sm-2" type="text"
                       name="search" id="search" value="<?= $search ?>"
                       placeholder="Search" aria-label="Search">
                <button onclick="document.forms.searchForm.page.value=1" class="btn btn-outline-success my-2 my-sm-0" type="submit">

                    Search
                </button>&nbsp;
                <button onclick="location.href='<?= $pageUrl ?>'"
                        class="btn btn-warning my-2 my-sm-0"
                        type="button">

                    RESET
                </button>
            </form>
        </div>
    </nav>

</header>