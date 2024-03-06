<div class="container">

    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit Category</h5>
        <form class="card-body" action="/<?= $language->getLanguage() ?>/admin/category/edit/<?= $category->getId() ?>"
              method="post">
            <div class="form-group">
                <label>
                    ID
                </label>
                <input disabled class="form-control" type="text" name="id"
                       value="<?= $category->getId() ?>">
            </div>
            <div class="form-group mt-1">
                <label>
                    Name
                </label>
                <input class="form-control" placeholder="Category" type="text" name="category"
                       value="<?= $category->getCategory() ?>">
            </div>
            <button type="submit"
                    class="btn btn-success btn-block w-100 mt-3"><?= $language->GetVar('save') ?></button>
            <a class="btn btn-danger btn-block w-100 mt-3"
               href="/<?= $language->GetLanguage() ?>/admin/category">Cancel</a>
        </form>
    </div>
</div>