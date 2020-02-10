<div class="table-responsive">
<table class="table table-hover ar-lists-table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Duration</th>
      <th scope="col">Type</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($tests as $test) {?>
      <tr>
        <td>Listening Test #<?php echo $test['id'] ?></td>
        <td><?php echo $test['time'] ?></td>
        <td><?php echo $test['module_type'] ?></td>
        <td><?php echo $test['test_status'] ?></td>
        <td>
        <a href="" class="btn btn-success btn-olive">Edit</a>
        <a href="" class="btn btn-orange">Delete</a>
        </td>
      </tr>
   <?php }?>
  </tbody>
</table>
</div>
