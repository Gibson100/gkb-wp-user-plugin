<?php include_once "edit_employee.php" ?>

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

    // QUERY HERE TO COUNT TOTAL RECORDS FOR PAGINATION 
    $total = $wpdb->get_var("SELECT COUNT(*) FROM `wp_gkblabs_employees`");
    $user_per_page = 3;
    $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
    $offset = ( $page * $user_per_page ) - $user_per_page;

    // QUERY HERE TO GET OUR RESULTS
    $results = $wpdb->get_results("SELECT * FROM `wp_gkblabs_employees` LIMIT $user_per_page OFFSET $offset");

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
            <td><a href='/delete/' class='btn btn-danger' onclick="return confirm('Are you sure you want to delete <?php echo $result->FirstName .' '. $result->LastName ?>?')">Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>  
  </table>

<!-- pagination -->
<?php 
echo '<div class="pagination inline">';
echo paginate_links( array(
'base' => add_query_arg( 'cpage', '%#%' ),
'format' => '',
'prev_text' => __('&laquo;'),
'next_text' => __('&raquo;'),
'total' => ceil($total / $user_per_page),
'current' => $page,
'type' => 'list'
));
echo '</div>';
?>

<style>  
  .pagination{
    float: right;
  }            
  .pagination a {   
      font-weight:bold;   
      font-size:18px;   
      color: black;      
      padding: 8px 16px;   
      text-decoration: none;   
      border:1px solid black;
   
  }   
  .pagination a.active {   
      background-color: pink;   
  }   
  .pagination a:hover:not(.active) {   
      background-color: skyblue;   
  }  
  .page-numbers > li {
    display: inline-block;
  }
</style>
