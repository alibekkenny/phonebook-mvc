<div class="container">

    <div class="card card-login mx-auto mt-5 w-50">
        <h5 class="card-header py-3 ">Create contact</h5>
        <div class="card-body">
            <form action="/contact/add" method="post">
                <div class="form-group">
                    <label>Contact name</label>
                    <input class="form-control" placeholder="Name" type="text" name="contact_name">
                </div>

                <div class="form-group mt-1">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Lorem ipsum dolor..." rows="3" type="text"
                              name="description"></textarea>
                </div>
                <!--                <div class="form-group mt-1">-->
                <!--                    <label>Phone number</label>-->
                <!--                    <input class="form-control" placeholder="87077777777" type="text" name="phone">-->
                <!--                </div>-->
                <div class="for_numbers">
                    <div class="form-group mt-1" id="existingForm">

                        <div class="d-flex">
                            <input class="form-control" style="margin-right: 2%; width: 40%;" type="text"
                                   name="phone[0][category]">
                            <input class="form-control" type="text" name="phone[0][number]">
                            <button style="width: 10%; margin-left: 2%;" type="button" onclick="createNewElement()"
                                    class="btn form-control btn-success">
                                +
                            </button>
                        </div>

                    </div>
                </div>
                <script>
                    counter = 1;

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
                <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Add to phone book</button>
            </form>
            <a class="btn btn-danger px-4 mt-2 w-100" href="/contact">Cancel</a>
        </div>
    </div>
</div>