<?php
$test_type = $_GET['type'];
$title = $_GET['test'];
$test_data = isset($test_data) ? $test_data : '';
if ($test_type == 'listening') {
    $args = array
        (
        'post_type' => 'attachment',
        'post_mime_type' => 'audio',
        'numberposts' => -1,
    );
    $audiofiles = get_posts($args);

}

$back_url = menu_page_url($test_type . '-home', false);
$no_of_sections = $test_type == 'writing' ? 2 : 4;
$page_name = $test_type . '-home';
$home_url = menu_page_url($page_name, false);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id = $test_data ? $test_data['id'] : $id;

$edit_url = add_query_arg(array(
    'test' => 'edit',
    'type' => $test_type,
    'id' => $id,
), $home_url);
?>

<div class="container ielts-test">
    <div class="header">
        <div class="right">
            <h2 class="title"><?php echo $title ?> Test</h2>
        </div>
        <div class="left">
            <a href="<?php echo $back_url ?>" class="btn btn-primary"><span
                    class="dashicons dashicons-arrow-left-alt"></span>Back</a>
        </div>
    </div>



    <form action="<?php echo $edit_url ?>" method="POST">
        <input type="hidden" name="test_type" value="<?php echo $test_type ?>">
        <input type="hidden" name="test_id" value="<?php echo $id ?>">
        <input type="hidden" name="case" value="<?php echo $title ?>">
        <div class="test-block">
            <?php if ($test_type == 'listening'): ?>
            <div class="form-group">
                <label for="file">Audio file</label>
                <select name="audio-file" id="audio-file" class="form-control">
                <option >Select audio</option>
                <?php
foreach ($audiofiles as $file) {
    $url = wp_get_attachment_url($file->ID);
    $selected = $test_data && $test_data['file_path'] && $test_data['file_path'] == $url ? 'selected' : '';
    echo '<option value=' . $url . ' ' . $selected . '>' . $file->post_title . '</option>';

}
?>
                </select>
                <!-- <input accept="audio/*" required class="form-control" type="file" name="audio-file" id="audio-file"  /> -->
            </div>
            <?php endif;?>
            <div class=" d-flex justify-content-between">
                    <div class="form-group">
                        <label for="time">Time (hh:mm)</label>
                        <input type="time" required name="time" class="ui-time" value="<?php echo $test_data && $test_data['time'] ? $test_data['time'] : '01:00' ?>" />
                    </div>

                    <div class="form-group">
                        <label for="time">Type</label>
                        <select name="module_type" id="">
                            <option value="general"
                            <?php echo $test_data && $test_data['module_type'] == 'general'
? 'selected' : '' ?>>General</option>
                            <option value="academic" <?php echo $test_data && $test_data['module_type'] == 'academic' ?
'selected' : '' ?>>Academic</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Active</label>
                        <select name="status" id="">
                            <option value="inactive"
                            <?php echo $test_data && $test_data['test_status'] == 'inactive'
? 'selected' : '' ?>>inactive</option>
                            <option value="active" <?php echo $test_data && $test_data['test_status'] == 'active' ?
'selected' : '' ?>>active</option>
                        </select>
                    </div>
            </div>
        </div>

        <div class="text-right">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
        </div>


        <div class="sections-area">
            <?php for ($i = 1; $i <= $no_of_sections; $i++) {
    $_GET['section_id'] = $i;
    $_GET['section_para'] = $test_data && $test_data['section_para_' . $i] ? stripslashes($test_data['section_para_' . $i]) : '';
    $_GET['test_form_editor'] = $test_data && $test_data['test_form_editor_' . $i] ? stripslashes($test_data['test_form_editor_' . $i]) : '';
    ?>
            <div class="sections-block" data-section-id="<?php echo $i ?>">
                <?php include 'section-block.php'?>
            </div>
            <?php }?>
        </div>

        <?php
if ($test_type != 'writing') {
    include 'answers-block.php';
}
?>
    </form>
</div>