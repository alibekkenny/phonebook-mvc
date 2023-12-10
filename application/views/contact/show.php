<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Additional info</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone_book as $index => $value) { ?>
        <tr>
            <th scope="row"><?= $value['id'] ?></th>
            <td><?= $value['name'] ?></td>
            <td><?php foreach ($value['phone'] as $key => $phone) {
                    echo $phone['name'] . ' - ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success" href="/contact/edit/<?= $value['id'] ?>">Edit</a>
                <a class="btn px-3 py-1 btn-danger" href="/contact/delete/<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>