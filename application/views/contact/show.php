<a class="btn btn-primary float-end"
   href="/<?= $language->GetLanguage() ?>/contact/add"><?= $language->GetVar('add_contact') ?></a>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1"><?= $language->GetVar('id') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('name') ?></th>
        <th scope="col" class="col-sm-2"><?= $language->GetVar('phone') ?></th>
        <th scope="col" class=""><?= $language->GetVar('add_info') ?></th>
        <th scope="col" class="col-sm-3"><?= $language->GetVar('actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone_book as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value['id'] ?></th>
            <td><?= $value['name'] ?></td>
            <td>
                <!--                <a class="btn px-3 py-1 btn-primary" href="/contact/-->
                <?php //= $value['id'] ?><!--/phone/add">Add-->
                <!--                    new source</a><br>-->
                <?php foreach ($value['phone'] as $key => $phone) {
                    echo $phone['category'] . ': ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/contact/edit/<?= $value['id'] ?>"><?= $language->GetVar('edit') ?></a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/en/contact/delete/<?= $value['id'] ?>"><?= $language->GetVar('delete') ?></a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>