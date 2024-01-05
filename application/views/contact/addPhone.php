<div class="container">
    <div class="h3"> Contact Details</div>
    <div class="row">
        <div class="col">
            <label>Name</label>
            <input class="form-control" type="text" name="name" disabled value="<?= $contact['name'] ?>">
        </div>
        <div class="col">
            <label>Description</label>
            <textarea rows="3" class="form-control" type="text" name="description"
                      disabled><?= $contact['description'] ?></textarea>
        </div>
    </div>
    <div class="card card-login mx-auto mt-5">
        <h5 class="card-header py-3 ">Add new value</h5>
        <div class="card-body">
            <form action="/contact/<?= $contact['id'] ?>/phone/add" method="post">
                <div id="for_numbers">
                    <div class="form-group mt-2">
                        <label>Category</label>
                        <select class="form-select" aria-label="Default select example" name="phone_category">
                            <?php foreach ($categories as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Value</label>
                        <input class="form-control" type="text" name="phone_number">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block w-100 mt-3">Add to phone book</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100" href="/contact">Cancel</a>
        </div>
    </div>
</div>
