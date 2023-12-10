<div class="container">

    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Edit contact</h5>
        <div class="card-body">
            <form action="/contact/edit/<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label>Contact name</label>
                    <input class="form-control" placeholder="Name" type="text" name="contact_name"
                           value="<?= $data['name'] ?>">
                </div>

                <div class="form-group mt-1">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Lorem ipsum dolor..." rows="3" type="text"
                              name="description"><?= $data['description'] ?></textarea>
                </div>
                <!--                <div class="form-group mt-1">-->
                <!--                    <label>Phone numbers</label>-->
                <!--                    <input class="form-control" placeholder="87077777777" type="text" name="phone"-->
                <!--                           value="--><?php //= $data['phone_number'] ?><!--">-->
                <!--                </div>-->
                <div class="for_numbers">
                    <?php foreach ($data['phone'] as $key => $value) { ?>
                        <div class="form-group mt-1" id="existingForm">

                            <div class="d-flex">
                                <input class="form-control" type="hidden" name="phone[<?= $key ?>][id]"
                                       value="<?= $value['id'] ?>">
                                <input class="form-control" style="margin-right: 2%; width: 40%;" type="text"
                                       name="phone[<?= $key ?>][category]"
                                       value="<?= $value['name'] ?>">
                                <input class="form-control" type="text" name="phone[<?= $key ?>][number]"
                                       value="<?= $value['phone'] ?>">
                                <button style="width: 10%; margin-left: 2%;" type="button" onclick="createNewElement()"
                                        class="btn form-control btn-success">
                                    +
                                </button>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <script>
                    counter = <?= count($data['phone']);?>;

                    // JavaScript function to create a new element
                    function createNewElement() {
                        // Clone the existing element
                        var existingForm = document.getElementById('existingForm');
                        var clonedForm = existingForm.cloneNode(true);

                        // Clear the input value in the cloned form (optional)
                        let inputPhone = clonedForm.querySelector('input[name="phone[0][number]"]');
                        inputPhone.name = 'phone[' + counter + '][number]';
                        inputPhone.value = ''
                        let inputCategory = clonedForm.querySelector('input[name="phone[0][category]"]');
                        inputCategory.name = 'phone[' + counter + '][category]';
                        inputCategory.value = ''
                        // Append the cloned element below the existing one
                        counter++;
                        existingForm.parentNode.appendChild(clonedForm);
                    }
                </script>
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Apply changes</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100" href="/contact">Cancel</a>
        </div>
    </div>
</div>