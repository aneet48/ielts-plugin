<?php
$test_type = $_GET['type'];
$back_url = menu_page_url($test_type . '-home', false);
$no_of_sections = $test_type == 'writing' ? 2 : 4
?>

<div class="container ielts-test">
    <div class="header">
        <div class="right">
            <h2 class="title">Create Test</h2>
        </div>
        <div class="left">
            <a href="<?php echo $back_url ?>" class="btn btn-primary"><span
                    class="dashicons dashicons-arrow-left-alt"></span>Back</a>
        </div>
    </div>



    <form action="" method="POST">

        <div class="test-block">
            <?php if ($test_type == 'listening'): ?>
            <div class="form-group">
                <label for="file">Audio file</label>
                <input accept="audio/*" class="form-control" type="file" name="audio-file" id="audio-file" />
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="time">Time (hh:mm)</label>
                        <input type="time" name="time" class="ui-time" value="01:00" />
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="form-group">
                        <label for="time">Active</label>
                        <select name="active" id="">
                            <option value="inactive">inactive</option>
                            <option value="active">active</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
        </div>


        <div class="sections-area">
            <?php for ($i = 1; $i <= $no_of_sections; $i++) {
    $_GET['section_id'] = $i;
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