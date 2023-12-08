<div class="container">

    <button class="btn btn-primary px-4" onclick="history.back()">Back</button>
    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Login page</h5>
        <div class="card-body">
            <form action="/login" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group mt-1">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <a class="link float-end mt-2" href="/register">Don't have an account yet?</a>

                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Sign in</button>
            </form>
        </div>
    </div>
</div>