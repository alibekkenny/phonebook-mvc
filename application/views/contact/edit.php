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
                <div id="for_numbers">
                    <button type="button" onclick="createNewElement()"
                            class="mt-2 btn form-control btn-primary text-white">
                        Add phone number
                    </button>
                    <?php foreach ($data['phone'] as $key => $value) { ?>
                        <div class="form-group mt-2">

                            <div class="d-flex">
                                <input class="form-control" type="hidden" name="phone[<?= $key ?>][id]"
                                       value="<?= $value['id'] ?>">
                                <input class="form-control" style="margin-right: 2%; width: 40%;" type="text"
                                       name="phone[<?= $key ?>][category]"
                                       value="<?= $value['name'] ?>">
                                <input class="form-control" type="text" name="phone[<?= $key ?>][number]"
                                       value="<?= $value['phone'] ?>">
                                <button style="margin-left: 1%;" class="btn btn-danger"
                                        onclick="deleteElement(this, <?= $value['id'] ?>)">
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
                <button type="submit" class="btn btn-success btn-block w-100 mt-3">Apply changes</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100" href="/contact">Cancel</a>
        </div>
    </div>
</div>

<script>
    counter = <?= count($data['phone']);?>;
    console.log('counter: ' + counter)

    // JavaScript function to create a new element
    function createNewElement() {
        const form_group = document.createElement('div');
        form_group.className = 'form-group mt-2';
        const innerDiv = document.createElement('div');
        innerDiv.className = 'd-flex';

        const categoryInput = document.createElement('input');
        categoryInput.className = 'form-control';
        categoryInput.style.marginRight = '2%';
        categoryInput.style.width = '40%';
        categoryInput.type = 'text';
        categoryInput.name = 'phone[' + (counter) + '][category]';
        categoryInput.value = '';


        const numberInput = document.createElement('input');
        numberInput.className = 'form-control';
        numberInput.type = 'text';
        numberInput.name = 'phone[' + (counter) + '][number]';
        numberInput.value = '';

        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger';
        deleteButton.style.marginLeft = '1%';
        // deleteButton.innerText = '-';
        deleteButton.setAttribute('onclick', 'deleteElement(this, 0)');

        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        svg.setAttribute("width", "16");
        svg.setAttribute("height", "16");
        svg.setAttribute("fill", "currentColor");
        svg.setAttribute("class", "bi bi-trash");
        svg.setAttribute("viewBox", "0 0 16 16");

        // Create the second path element
        const path2 = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path2.setAttribute("d", "M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z");

        // Append the path elements to the SVG element
        svg.appendChild(path2);
        deleteButton.appendChild(svg);

        innerDiv.appendChild(categoryInput);
        innerDiv.appendChild(numberInput);
        innerDiv.appendChild(deleteButton);
        form_group.appendChild(innerDiv);
        var for_numbers = document.getElementById('for_numbers');
        for_numbers.appendChild(form_group);
        counter++;
    }

    function deleteElement(el, id) {
        if (id == 0) {
            // console.log(id);
        } else {
            fetch('/contact/phone/delete/' + id, {
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