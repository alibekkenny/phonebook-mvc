<div class="container">
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">Registration form</h5>
        <div class="card-body">
            <form action="/<?= $language->GetLanguage() ?>/register" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group mt-1">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group mt-1">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <a class="link float-end mt-2" href="/<?= $language->GetLanguage() ?>/login">Already have an account</a>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Sign up</button>
            </form>
        </div>
    </div>
</div>