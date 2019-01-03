<form id="updateForm" action="controller/updateRecord.php?<?=$defaultParams?>" method="post">
    <div class="form-group row">
        <input type="hidden" name="id" value="<?=$user['id']?>">

        <input type="hidden" name="action"
               value="<?=$user['id'] ? 'store':'save'?>">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Full name</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control form-control-lg"
                   value="<?=$user['username']?>"
                   name="username" id="username" placeholder="user name">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" required class="form-control  form-control-lg"
                   value="<?=$user['email']?>"
                   name="email" id="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="fiscalcode" class="col-sm-2 col-form-label">FISCAL CODE</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control  form-control-lg"
                   value="<?=$user['fiscalcode']?>"
                   name="fiscalcode"
                   id="fiscalcode" placeholder="FISCAL CODE">
        </div>
    </div>
    <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label">AGE</label>
        <div class="col-sm-10">
            <input required type="number" min="0" max="120" class="form-control  form-control-lg"
                   value="<?=$user['age']?>"
                   name="age"
                   id="age">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <?php if($user['id']) {?>
        <div class="col-sm-5 text-center">
            <a href="<?=$deleteUserUrl?>?id=<?=$user['id']?>&action=delete" onclick="return confirm('DELETE USER?')"
                    class="btn btn-danger">
            <i class="fa fa-trash"></i>
            DELETE
            </a>

        </div>
        <?php } ?>
        <div class="<?=$user['id']?'col-sm-5':'col-sm-12'?>  text-center">
            <button class="btn btn-success">

            <i class="fa fa-pen"></i>
           <?= $user['id']?'UPDATE' : 'INSERT'?>
            </button>
        </div>
    </div>
</form>
