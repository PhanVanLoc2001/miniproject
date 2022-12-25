<?php 
include 'user_page.php' ;

?>
  <div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $each) {?>
      <tr>
        <td><?php echo $each['ID'] ?></td>
        <td><?php echo $each['name'] ?></td>
        <td><?php echo $each['email'] ?></td>
      </td>
      <?php } ?>
    </tbody>
  </table>
</div>