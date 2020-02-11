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
            <?php foreach ($tests as $test) {
    $page_name = $test['test_type'] . '-home';
    $home_url = menu_page_url($page_name, false);
    $edit_url = add_query_arg(array(
        'test' => 'edit',
        'type' => $test['test_type'],
        'id' => $test['id'],
    ), $home_url);
    $delete = add_query_arg(array(
        'test' => 'delete',
        'type' => $test['test_type'],
        'id' => $test['id'],
    ), $home_url);

    ?>
            <tr>
                <td><?php echo $test['test_type'] ?> Test #<?php echo $test['id'] ?></td>
                <td><?php echo $test['time'] ?></td>
                <td><?php echo $test['module_type'] ?></td>
                <td><?php echo $test['test_status'] ?></td>
                <td>
                    <a href="<?php echo $edit_url ?>" class="btn btn-success btn-olive">Edit</a>
                    <a href="<?php echo  $delete ?>"  onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-orange">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>