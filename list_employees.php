
<div class="container mt-3">
  <h2>All Employees</h2>         
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
    include_once "edit_employee.php";
    global $wpdb;

    $results = $wpdb->get_results("SELECT * FROM `wp_gkblabs_employees`");

    foreach($results as $result)
    {
        echo "
        <tr>
            <td><img class='w-25' src='/' alt=''></td>
            <td>$result->id</td>
            <td>$result->FirstName</td>
            <td>$result->LastName</td>
            <td>$result->Email</td>
            <td>$result->Hobbies</td>
            <td>$result->Gender</td>
            <td><a href='/' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>Edit</a></td>
            <td><a href='javascript:void' class='btn btn-danger' id='deletebtn'>Delete</a></td>
        </tr>";
    }
      ?>
    </tbody>  
  </table>
</div>


<script>

    document.getElementById("deletebtn").addEventListener("click", function() {
        if(confirm('Are you sure you want to delete this item?') == true){ window.location.href = "/" };
    })
</script>
