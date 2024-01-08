<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col" class="col-sm-1">ID</th>
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
            <td>
                <!--                <a class="btn px-3 py-1 btn-primary" href="/contact/-->
                <?php //= $value['id'] ?><!--/phone/add">Add-->
                <!--                    new source</a><br>-->
                <?php foreach ($value['phone'] as $key => $phone) {
                    echo $phone['category'] . ' - ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success" href="/contact/edit/<?= $value['id'] ?>">Edit</a>
                <a class="btn px-3 py-1 btn-danger" href="/contact/delete/<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>