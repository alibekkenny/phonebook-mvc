<div class="container">
    <div class="h3"> <?= $language->GetVar('contact_details') ?></div>
    <div class="row">
        <div class="col">
            <label><?= $language->GetVar('name') ?></label>
            <input class="form-control" type="text" name="name" disabled value="<?= $contact['name'] ?>">
        </div>
        <div class="col">
            <label><?= $language->GetVar('desc') ?></label>
            <textarea rows="3" class="form-control" type="text" name="description"
                      disabled><?= $contact['description'] ?></textarea>
        </div>
    </div>
    <div class="card card-login mx-auto mt-5">
        <h5 class="card-header py-3 "><?= $language->GetVar('add_new_value') ?></h5>
        <div class="card-body">
            <form action="/<?= $language->GetLanguage() ?>/contact/<?= $contact['id'] ?>/phone/add" method="post">
                <div id="for_numbers">
                    <div class="form-group mt-2">
                        <label><?= $language->GetVar('category') ?></label>
                        <select class="form-select" aria-label="Default select example" name="phone_category">
                            <?php foreach ($categories as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label><?= $language->GetVar('value') ?></label>
                        <input class="form-control" type="text" name="phone_number">
                    </div>
                </div>
                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3"><?= $language->GetVar('add_to_phonebook') ?></button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="/<?= $language->GetLanguage() ?>/contact"><?= $language->GetVar('cancel') ?></a>
        </div>
    </div>
</div>
