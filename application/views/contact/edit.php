<div class="container">

    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 "><?= $language->GetVar('edit_contact') ?></h5>
        <div class="card-body">
            <form action="/<?= $language->GetLanguage() ?>/contact/edit/<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label><?= $language->GetVar('contact_name') ?></label>
                    <input class="form-control" placeholder="Name" type="text" name="contact_name"
                           value="<?= $data['name'] ?>">
                </div>

                <div class="form-group mt-1">
                    <label><?= $language->GetVar('desc') ?></label>
                    <textarea class="form-control" placeholder="Lorem ipsum dolor..." rows="3" type="text"
                              name="description"><?= $data['description'] ?></textarea>
                </div>
                <div id="for_numbers">
                    <a class="mt-2 btn form-control btn-primary text-white"
                       href="/<?= $language->GetLanguage() ?>/contact/<?= $data['id'] ?>/phone/add">
                        <?= $language->GetVar('add_phone') ?>
                    </a>


                    <?php foreach ($data['phone'] as $key => $value) { ?>
                        <div class="form-group mt-2">

                            <div class="d-flex">
                                <input class="form-control" type="hidden" name="phone[<?= $key ?>][id]"
                                       value="<?= $value->getId() ?>">
                                <select name="phone[<?= $key ?>][phone_category]" style="margin-right: 2%; width: 40%;"
                                        class="form-select"
                                        aria-label="Default select example">
                                    <?php foreach ($categories as $c_key => $c_value) { ?>
                                        <option value="<?= $c_value->getId() ?>" <?= $value->getCategory()->getId() == $c_value->getId() ? "selected" : "" ?>><?= $c_value->getCategory() ?></option>
                                    <?php } ?>
                                </select>
                                <input class="form-control" type="text" name="phone[<?= $key ?>][phone_number]"
                                       value="<?= $value->getPhone() ?>">
                                <button style="margin-left: 1%;" class="btn btn-danger"
                                        onclick="deleteElement(this, <?= $value->getId() ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash" viewBox="0 0 16 16">
                                        <!--                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>-->
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <button type="submit"
                        class="btn btn-success btn-block w-100 mt-3"><?= $language->GetVar('save') ?></button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100"
               href="/<?= $language->GetLanguage() ?>/contact"><?= $language->GetVar('cancel') ?></a>
        </div>
    </div>
</div>

<script>
    function deleteElement(el, id) {
        if (id == 0) {
            // console.log(id);
        } else {
            fetch('/en/contact/phone/delete/' + id, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json; charset=UTF-8"
                },
            });
        }
        let element = el.parentElement.parentElement;
        element.remove();
    }
</script>