<!--<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>-->
<div class="h1"> User list</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1">ID</th>
        <th scope="col" class="col">Name</th>
        <th scope="col" class="col">Email</th>
        <!--        <th scope="col" class="col-sm-4">Password</th>-->
        <th scope="col" class="col">Contact</th>
        <th scope="col" class="col-sm-2">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value['id'] ?></th>
            <td><?= $value['name'] ?></td>
            <!--            <td>--><?php //foreach ($value['phone'] as $key => $phone) {
            //                    echo $phone['name'] . ' - ' . $phone['phone'] . '<br>';
            //                } ?><!--</td>-->
            <td><?= $value['email'] ?></td>
            <td><a class="btn px-3 py-1 btn-primary"
                   href="/<?= $language->GetLanguage() ?>/admin/user/<?= $value['id'] ?>/contact">Show contacts</a>
            </td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/user/edit/<?= $value['id'] ?>">Edit</a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/user/delete/<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>