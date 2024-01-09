<div class="container">

    <!--    <button class="btn btn-primary px-4" onclick="history.back()">Back</button>-->
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 "><?= $language->GetVar('login') ?></h5>
        <div class="card-body">
            <form action="/login" method="post">
                <div class="form-group">
                    <label><?= $language->GetVar('email') ?></label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group mt-1">
                    <label><?= $language->GetVar('password') ?></label>
                    <input class="form-control" type="password" name="password">
                </div>
                <a class="link float-end mt-2" href="/register"><?= $language->GetVar('no_account') ?></a>

                <button type="submit"
                        class="btn btn-primary btn-block w-100 mt-3"><?= $language->GetVar('sign_in') ?></button>
            </form>
        </div>
    </div>
</div>