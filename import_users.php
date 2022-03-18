<?php

if ($_REQUEST['page'] === 'import-users' && isset($_POST['submit']))
{
    $filename = $_FILES["uploadfile"]["tmp_name"];;
    $count = 0;

    if ($_FILES['uploadfile']['size'] > 0)
    {
        $file = fopen($filename, 'r');
        global $wpdb;

        while (($column = fgetcsv($file, 10000, ","))!== FALSE)
        {   
            if (strtolower($column[0]) == "firstname")
            {
                continue;
            }
            try
            {
                    $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`) VALUES (NULL, '$column[0]', '$column[1]', '$column[2]')");
                    $count ++;
              
                // else if(!array_key_exists(4,$column))
                // {
                //     $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`) VALUES (NULL, '$column[0]', '$column[1]', '$column[2]', '$column[3]')");
                //     $count ++;
                // }
                // else
                // {
                //     $wpdb->query("INSERT INTO `wp_gkblabs_employees` (`id`, `FirstName`, `LastName`, `Email`, `Hobbies`, `Gender`) VALUES (NULL, '$column[0]', '$column[1]', '$column[2]', '$column[3]', '$column[4]')");
                //     $count ++;
                // }
            }
            catch(Exception $ex)
            {
                echo "please make sure your csv if in correct format!";
                return;
            }
        }
    }
    if ($count > 0)
    {
        echo "<div class='alert alert-success'>
        <strong>Success!</strong>Successfully imported $count records
      </div>";
    }
    else
    {
        echo "<div class='alert alert-warning'>
        <strong>Warning!</strong> Failed to import the data
      </div>";
    }
}
?>
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="formFile" class="form-label">Upload CSV file</label>
    <input class="form-control w-50" name="uploadfile" type="file" accept=".csv" required/>
    </div>
    <button type="submit" name="submit">Submit</button>
</form>