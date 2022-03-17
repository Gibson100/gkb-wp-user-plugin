<div class="container mt-3">      
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Image</th>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Hobbies</th>
        <th>Gender</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    global $wpdb;

    //$path = str_replace('\\', '/', $path);

    // $folder = plugin_dir_path( __FILE__ ) .'assets/images' . '/';

    $url = plugin_dir_url(__FILE__) . 'assets/images/';

    // print_r($url);

    // die;

    $results = $wpdb->get_results("SELECT * FROM `wp_gkblabs_employees`");
    ?>

    <?php foreach($results as $result) : ?>
        <tr>
            <td><img class='bg-info rounded-circle' style='border-radius: 50%;width: 60px;height:60px' src="<?php echo $url . $result->Image ?>" alt=''></td>
            <td><?php echo $result->id ?></td>
            <td><?php echo $result->FirstName ?></td>
            <td><?php echo $result->LastName ?></td>
            <td><?php echo $result->Email ?></td>
            <td><?php echo $result->Hobbies ?></td>
            <td><?php echo $result->Gender ?></td>
            <td><a href='/' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>Edit</a></td>
            <td><a href='javascript:void' class='btn btn-danger' id='deletebtn'>Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>  
  </table>
</div>

<?php include_once "edit_employee.php" ?>
