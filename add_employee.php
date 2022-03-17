<?php

if ($_REQUEST['page'] === 'gkblabs-create-user'    && !empty($_REQUEST['fname']) && !empty($_REQUEST['lname']) && !empty($_REQUEST['email']) && !empty($_REQUEST['gender']))
{
    if (empty($_REQUEST['hobbies']))
    {
        echo "<script>alert('atleast 1 hobbie should be selected')</script>";
        return; 
    }

    $fname = htmlentities($_REQUEST['fname']);
    $lname = htmlentities($_REQUEST['lname']);
    $email = htmlentities($_REQUEST['email']);
    $gender = htmlentities($_REQUEST['gender']);
    $hobbies = implode(',',$_REQUEST['hobbies']); //convert array into string 

    global $wpdb;

    // check if user has sent an image
    if (empty($_FILES))
    {
        $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`, `Gender`, `Image`) VALUES (NULL, '$fname', '$lname', '$email', '$hobbies', '$gender', 'no image')");
    }
    else
    {
        //handle image 
        // If request contains a file ...
        
        $filename = $_FILES["profile"]["name"];
        $tempname = $_FILES["profile"]["tmp_name"]; 
        
        $path = plugin_dir_path(__FILE__);

        $folder = $path.'assets/images/'.$filename;

        //die($folder);

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            // Execute query
            $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`, `Gender`, `Image`) VALUES (NULL, '$fname', '$lname', '$email', '$hobbies', '$gender', '$filename')");
        }
        else
        {
           echo "<script>alert('Failed to upload image, try again!')</script>";
        }

    }

    echo "<script>alert('Successfully added user')</script>";
    
}
?>

<!-- Form -->
<div">

<h4 class="modal-title">Add a new Employee</h4>
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">First Name:</label>
        <input type="text" class="form-control w-50" id="fname" placeholder="Enter First Name" name="fname"
            required>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name:</label>
        <input type="text" class="form-control w-50" id="lname" placeholder="Enter Lastname" name="lname"
            required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control w-50" id="email" placeholder="Enter Email" name="email"
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
    <div class="mb-3">
        <label for="imgInp" class="form-label">upload Profile:</label>
        <input accept="image/*" type='file' id="imgInp" name="profile" />
        <img class="w-25" id="blah" src="#" />
        <div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>