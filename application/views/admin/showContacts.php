<div class="h1"> Contacts list</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1">Contact ID</th>
        <th scope="col" class="col-sm-2">Name</th>
        <th scope="col" class="col-sm-3">Phone</th>
        <th scope="col" class="col-sm-4">Additional info</th>
        <th scope="col" class="col-sm-2">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone_book as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value['id'] ?></th>
            <td><?= $value['name'] ?></td>
            <td><?php foreach ($value['phone'] as $key => $phone) {
                    echo $phone['category'] . ' - ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/edit/<?= $value['id'] ?>">Edit</a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/contact/delete/<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>