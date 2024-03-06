<div class="container">
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3"><?= $language->GetVar('user_edit') ?></h5>
        <div class="card-body">
            <form action="/<?= $language->GetLanguage() ?>/admin/user/edit/<?= $user->getId() ?>" method="post">
                <div class="form-group">
                    <label><?= $language->GetVar('id') ?></label>
                    <input class="form-control" type="text" name="id" readonly value="<?= $user->getId() ?>">
                </div>
                <div class="form-group">
                    <label><?= $language->GetVar('name') ?></label>
                    <input class="form-control" type="text" name="name" value="<?= $user->getName() ?>">
                </div>
                <div class="form-group mt-1">
                    <label><?= $language->GetVar('email') ?></label>
                    <input class="form-control" type="email" name="email" value="<?= $user->getEmail() ?>">
                </div>
                <div class="form-group mt-1">
                    <label><?= $language->GetVar('password') ?></label>
                    <input class="form-control" type="password" name="password" value="<?= $user->getPassword() ?>">
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block w-100 mt-3"><?= $language->GetVar('save') ?></button>
            </form>
        </div>
    </div>
</div>