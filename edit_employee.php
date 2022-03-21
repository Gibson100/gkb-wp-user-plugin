<?php 
require_once "update_employee.php";

    if (!empty($_GET['id']))
    {
        echo "<script type='text/javascript' defer>
            $('#myModal').modal('show');    
    </script>";
        // begin the update process
        $id = $_GET['id'];
        $url = plugin_dir_url(__FILE__) . 'assets/images/';
        

        // get the data from the database 
        global $wpdb;

        $data = $wpdb->get_results("SELECT * FROM `wp_gkblabs_employees` WHERE `id` = '$id'");

        // show the modal with data inside
        echo "<script type='text/javascript'>
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
        </script>";

    }
?>

<?php if(!empty($data)) foreach($data as $result) : ?>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new Employee</h4>
                <button type="button" class="btn-close closebtn" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="emp_id" value="<?=$result->id?>">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="<?=$result->FirstName?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Lastname" name="lname" value="<?=$result->LastName?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?=$result->Email?>"
                            required>
                    </div>
                    <?php $hobbies = explode(',',$result->Hobbies) // make strings into array ?>
                    Hobbies
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="TV" <?php if(in_array('TV',$hobbies)){echo 'checked';}?>>
                        <label class="form-check-label">TV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check2" name="hobbies[]" value="Reading" <?php if(in_array('Reading',$hobbies)){echo 'checked';}?>>
                        <label class="form-check-label">Reading</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="Coding" <?php if(in_array('Coding',$hobbies)){echo 'checked';}?>>
                        <label class="form-check-label">Coding</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="Skiing" <?php if(in_array('Skiing',$hobbies)){echo 'checked';}?>>
                        <label class="form-check-label">Skiing</label>
                    </div>
                    Gender
                    <div class="form-check">
                        <input type="radio" class="form-check-input mt-1" id="radio1" name="gender" value="Male"
                        <?php if($result->Gender === 'Male'){echo 'checked';}?> >Male
                        <label class="form-check-label" for="radio1" required></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input mt-1" id="radio2" name="gender"
                            value="Female">Female
                        <label class="form-check-label" for="radio2"></label>
                    </div>
                    upload Profile
                    <input accept="image/*" type='file' id="imgInp" name="profile" />
                    <img class="w-25" id="blah" src="<?php echo $url . $result->Image ?>" />

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php endforeach;?>

<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}

$('.closebtn').click(function(){
    window.location.replace('?page=list-users') // return the user back if they click cancel while editing a particular employee
})
    
</script>