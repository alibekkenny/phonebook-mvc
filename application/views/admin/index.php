<!--<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>-->
<div class="h1"><?= $language->GetVar('user_list') ?></div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1"><?= $language->GetVar('id') ?></th>
        <th scope="col" class="col"><?= $language->GetVar('name') ?></th>
        <th scope="col" class="col"><?= $language->GetVar('email') ?></th>
        <!--        <th scope="col" class="col-sm-4">Password</th>-->
        <th scope="col" class="col"><?= $language->GetVar('contacts') ?></th>
        <th scope="col" class="col-sm-3"><?= $language->GetVar('actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value->getId() ?></th>
            <td><?= $value->getName() ?></td>
            <!--            <td>--><?php //foreach ($value['phone'] as $key => $phone) {
            //                    echo $phone['name'] . ' - ' . $phone['phone'] . '<br>';
            //                } ?><!--</td>-->
            <td><?= $value->getEmail() ?></td>
            <td><a class="btn px-3 py-1 btn-primary"
                   href="/<?= $language->GetLanguage() ?>/admin/user/<?= $value->getId() ?>/contact"><?= $language->GetVar('show_contacts') ?></a>
            </td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/user/edit/<?= $value->getId() ?>"><?= $language->GetVar('edit') ?></a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/user/delete/<?= $value->getId() ?>"><?= $language->GetVar('delete') ?></a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>