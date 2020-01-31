<?php
$home_url = menu_page_url('listening-home',false);
$new_test_url = add_query_arg( array(
    'test' => 'create',
    'type' => 'listening',
), $home_url );
?>

<div class="container">
  <div class="header">
    <div class="right">
      <h2 class="title">Listening</h2>
      <p class="sub-title">View All Tests</p>
    </div>
    <div class="left">
      <a href="<?php echo  $new_test_url ?>" class="btn btn-primary"><span class="dashicons dashicons-plus"></span>Create Test</a>
    </div>
  </div>

  <div class="modules"></div>
</div>
