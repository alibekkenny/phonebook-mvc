<div class="container">
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3">User edit</h5>
        <div class="card-body">
            <form action="/<?= $language->GetLanguage() ?>/admin/user/edit/<?= $user['id'] ?>" method="post">
                <div class="form-group">
                    <label>Id</label>
                    <input class="form-control" type="text" name="id" readonly value="<?= $user['id'] ?>">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>">
                </div>
                <div class="form-group mt-1">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group mt-1">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?= $user['password'] ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Save</button>
            </form>
        </div>
    </div>
</div>