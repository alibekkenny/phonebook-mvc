<div class="h3"> User Details</div>
<div class="row">
    <div class="col-sm-3">
        <label>User Id</label>
        <input class="form-control" type="text" name="id" disabled value="<?= $user['id'] ?>">
    </div>
    <div class="col-sm-3">
        <label>Name</label>
        <input class="form-control" type="text" name="name" disabled value="<?= $user['name'] ?>">
    </div>
    <div class="col-sm-3">
        <label>Email</label>
        <input class="form-control" type="email" name="email" disabled value="<?= $user['email'] ?>">
    </div>
    <div class="col-sm-3">
        <label>Password</label>
        <input class="form-control" type="password" name="password" disabled value="<?= $user['password'] ?>">
    </div>
</div>

<!--<a class="btn btn-primary float-end" href="/contact/add">Add contact</a>-->
<div class="h5 mt-3"> User Contacts</div>
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
                    echo $phone['name'] . ' - ' . $phone['phone'] . '<br>';
                } ?></td>
            <td><?= $value['description'] ?></td>
            <td><a class="btn px-3 py-1 btn-success" href="/admin/contact/edit/<?= $value['id'] ?>">Edit</a>
                <a class="btn px-3 py-1 btn-danger" href="/admin/contact/delete/<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>