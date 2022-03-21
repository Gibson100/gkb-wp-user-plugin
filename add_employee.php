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
    if (($_FILES['profile']['name'] === ''))
    {
        $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`, `Gender`) VALUES (NULL, '$fname', '$lname', '$email', '$hobbies', '$gender')");
    }
    else 
    {
        //handle image 
        // If request contains a file ...
        
        $filename = $_FILES["profile"]["name"];
        $tempname = $_FILES["profile"]["tmp_name"]; 
        
        $path = plugin_dir_path(__FILE__);


        $temp = explode(".", $filename);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $folder = $path.'assets/images/'.$newfilename;

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            // Execute query
            $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`, `Gender`, `Image`) VALUES (NULL, '$fname', '$lname', '$email', '$hobbies', '$gender', '$newfilename')");
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
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data" id="form">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">First Name: <span class="error">*<span></label>
        <input type="text" class="form-control w-50" id="fname" placeholder="Enter First Name" name="fname"  required>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name: <span class="error">*<span></label>
        <input type="text" class="form-control w-50" id="lname" placeholder="Enter Lastname" name="lname"
            required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email: <span class="error">*<span></label>
        <input type="email" class="form-control w-50" id="email" placeholder="Enter Email" name="email"
            required>
    </div>
    Hobbies
    <div class="form-check">TV
        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="TV" required>
        <label class="form-check-label"></label>
    </div>
    <div class="form-check">
        <input class="form-check-input mt-1" type="checkbox" id="check1" name="hobbies[]" value="Reading">
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
    <div class="form-check">Male
        <input type="radio" class="form-check-input mt-1" id="radio1" name="gender" value="Male">
        <label class="form-check-label" for="radio1"></label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input mt-1" id="radio2" name="gender"
            value="Female" required>Female
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

<style>
  .error{
        color: red;
        font-size: 20px;
    }
</style>

<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}

// input validation code in jquery
$(document).ready(function () {

$('#form').validate({ // initialize the plugin
rules: {
        'fname': {
            required: true,
            minlength: 2,
        },

        'lname': {
            required: true,
            minlength: 2,
        },
    
        'hobbies[]': {
            required: true,
            minlength: 1, // <-- Add this line
        },
        'email': {
            required: true,
            minlength: 5,
        },
        'gender': {
            required: true,
        }
    },
    messages: {
        fname: {
            required: "first name is required",
        },
        lname: {
            required: "last name is reaquired",
        },
        // add single quotes
        'hobbies[]': "You must check at least 1 box",
        email: {
            required: "email is required",
            email: "Please enter a valid email address.",
        },
        'gender': 'Gender is required',
    }
});
});


</script>