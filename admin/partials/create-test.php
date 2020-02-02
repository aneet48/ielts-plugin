<?php
$test_type = $_GET['type'];
$back_url = menu_page_url($test_type . '-home', false);
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
            <?php //submit_button('Save', 'primary');?>
        </div>
        <div class="sections-area">
            <?php for ($i=1; $i <= 4; $i++) {
                $_GET['section_id'] = $i;
             ?>

            <div class="sections-block" data-section-id="<?php echo $i ?>">
                <?php include('section-block.php') ?>
            </div>
            <?php } ?>

        </div>

        <div class="answers-area">
            <div class="card w-100">
                <div class="card-header">
                    Answers
                </div>
                <div class="card-body">
                    <div class="help-block">
                        <p>Keep Following rules in mind</p>
                        <ul>
                            <li>For answers like (a book or 1 book or one book) , use(&lt;or&gt;) for example, write
                                (one
                                book &lt;or&gt; 1 book &lt;or&gt; a book )</li>
                            <li>If a question have multiple possible answers , use(&lt;and&gt;) for example for options
                                write (1 &lt;and&gt 2) </li>
                            <li>Use numbers like (1,2 ...) for options instead of (A ,B...)</li>
                            <li class="text-danger">***Follow above rules carefully</li>
                        </ul>
                    </div>
                    <div class="row">

                        <?php
                     for ($i=1; $i <= 40 ; $i++) { ?>
                        <div class="col-md-4 ans-block">

                            <div class="row ">
                                <label for="" class="col-sm-2"><?php echo $i ?></label>
                                <input type="text" name="ans[]" class="form-control col-sm-10">
                            </div>
                        </div>
                        <?php }
                   ?>
                    </div>

                    <div class="block">
                        <a href="#" class="btn btn-primary add-more-ans" >Add More Answer</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="text-right">
            <a href="#" class="btn btn-primary add-section">Add Section</a>
        </div> -->
    </form>




</div>