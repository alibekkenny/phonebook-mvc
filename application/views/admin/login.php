<div class="container">

    <!--    <button class="btn btn-primary px-4" onclick="history.back()">Back</button>-->
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 bg-secondary text-white"><?= $language->GetVar('admin_page') ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?= $language->GetVar('sign_in') ?></h5>
            <form action="/<?= $language->GetLanguage() ?>/admin/login" method="post">
                <div class="form-group">
                    <label><?= $language->GetVar('login') ?></label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group mt-1">
                    <label><?= $language->GetVar('password') ?></label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit"
                        class="btn btn-secondary btn-block w-100 mt-3"><?= $language->GetVar('sign_in') ?></button>
            </form>
        </div>
    </div>
</div>