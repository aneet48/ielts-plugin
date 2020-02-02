<?php
$section_id = $_GET['section_id'];
$test_type = $_GET['type'];

?>
<div class="card w-100">
    <div class="card-header">
        SECTION <?php echo $section_id ?>
    </div>
    <div class="card-body">
        <?php if($test_type != 'listening'): ?>

        <div class="row">
            <h2 class="section-title">Add Section Paragraph</h2>
            <div class="col-md-12">
                <?php wp_editor('', 'section-para-' . $section_id);?>

            </div>
        </div>
        <?php endif; ?>
        <?php if($test_type != 'writing'): ?>
        <div class="row new-section">
            <h2 class="section-title">Add Questions Block here</h2>

            <div class="col-md-9">
                <div class="test-section-block">
                    <?php include( 'editor.php')?>
                </div>
            </div>
            <div class="col-md-3 options-block">
                <div class="card">
                    <div class="card-header">
                        Select Qustion Type
                    </div>
                    <div class="card-body">
                        <?php include('choices/mcq.php') ?>
                        <?php include('choices/mcq-multi.php') ?>
                        <?php include('choices/yesno.php') ?>
                        <?php include('choices/user-input.php') ?>
                    </div>
                </div>

            </div>
        </div>
        <?php endif; ?>
    </div>
</div>