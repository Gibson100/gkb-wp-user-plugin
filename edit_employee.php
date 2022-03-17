<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new Employee</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Lastname" name="lname"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                            required>
                    </div>
                    Hobbies
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="TV">
                        <label class="form-check-label">TV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check2" name="hobbies[]" value="Reading">
                        <label class="form-check-label">Reading</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="Coding">
                        <label class="form-check-label">Coding</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="Skiing">
                        <label class="form-check-label">Skiing</label>
                    </div>
                    Gender
                    <div class="form-check">
                        <input type="radio" class="form-check-input mt-1" id="radio1" name="gender" value="Male"
                            checked>Male
                        <label class="form-check-label" for="radio1" required></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input mt-1" id="radio2" name="gender"
                            value="Female">Female
                        <label class="form-check-label" for="radio2"></label>
                    </div>
                    upload Profile
                    <input accept="image/*" type='file' id="imgInp" name="profile" />
                    <img class="w-50" id="blah" src="#" />

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
