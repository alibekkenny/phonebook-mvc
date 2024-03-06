<div class="h1"> Categories</div>
<div class="w-100">
    <a class="btn btn-primary inline-block float-end" href="/<?= $language->GetLanguage() ?>/admin/category/add">Add new
        category</a>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1">ID</th>
        <th scope="col" class="col-sm-2">Name</th>
        <th scope="col" class="col-sm-2">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) { ?>
        <tr>
            <th scope="col"><?= $category->getId() ?></th>
            <td> <?= $category->getCategory() ?></td>
            <td><a class="btn px-3 py-1 btn-success"
                   href="/<?= $language->GetLanguage() ?>/admin/category/edit/<?= $category->getId() ?>"><?= $language->GetVar('edit') ?></a>
                <a class="btn px-3 py-1 btn-danger"
                   href="/<?= $language->GetLanguage() ?>/admin/category/delete/<?= $category->getId() ?>"><?= $language->GetVar('delete') ?></a>
            </td>
            <!--            <td> Filter</td>-->
        </tr>
    <?php } ?>
    </tbody>
</table>