<div class="h3"> <?= $language->GetVar('user_details') ?></div>
<div class="row">
    <div class="col-sm-3">
        <label><?= $language->GetVar('id') ?></label>
        <input class="form-control" type="text" name="id" disabled value="<?= $user['id'] ?>">
    </div>
    <div class="col-sm-3">
        <label><?= $language->GetVar('name') ?></label>
        <input class="form-control" type="text" name="name" disabled value="<?= $user['name'] ?>">
    </div>
    <div class="col-sm-3">
        <label><?= $language->GetVar('email') ?></label>
        <input class="form-control" type="email" name="email" disabled value="<?= $user['email'] ?>">
    </div>
    <div class="col-sm-3">
        <label><?= $language->GetVar('password') ?></label>
        <input class="form-control" type="password" name="password" disabled value="<?= $user['password'] ?>">
    </div>
</div>

<!--<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>-->
<div class="h5 mt-3"> <?= $language->GetVar('user_contacts') ?></div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1"><?= $language->GetVar('contact_id') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('name') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('phone') ?></th>
        <th scope="col" class="col-sm"><?= $language->GetVar('add_info') ?></th>
        <th scope="col" class="col-sm-3"><?= $language->GetVar('actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone_book as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value['id'] ?></th>
            <td><?= $value['name'] ?></td>
            <td><?php foreach ($value['phone'] as $key => $phone) {
                    echo $phone['category'] . ': ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/edit/<?= $value['id'] ?>"><?= $language->GetVar('edit') ?></a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/delete/<?= $value['id'] ?>"><?= $language->GetVar('delete') ?></a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>