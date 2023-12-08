<div class="container">

    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit contact</h5>
        <div class="card-body">
            <form action="/contact/edit/<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label>Contact name</label>
                    <input class="form-control" placeholder="Name" type="text" name="contact_name"
                           value="<?= $data['name'] ?>">
                </div>
                <div class="form-group mt-1">
                    <label>Phone number</label>
                    <input class="form-control" placeholder="87077777777" type="text" name="phone"
                           value="<?= $data['phone_number'] ?>">
                </div>
                <div class="form-group mt-1">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Lorem ipsum dolor..." rows="3" type="text"
                              name="description"><?= $data['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Apply changes</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100" href="/contact">Cancel</a>
        </div>
    </div>
</div>