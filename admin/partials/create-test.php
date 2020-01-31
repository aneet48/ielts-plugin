<?php
$test_type = $_GET['type'];
$back_url = menu_page_url($test_type . '-home', false)
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


        <div class="sections-block">
            <div class="row">
                <div class="col-md-9">dsfdsf</div>
                <div class="col-md-3 options-block">
                    <div class="card">
                        <div class="card-header">
                            Select Qustion Type
                        </div>
                        <div class="card-body">
                           <!-- <button href="#" class="btn btn-secondary qus-type" data-type="mcq" >
                               MCQ
                           </button>
                           <button href="#" class="btn btn-secondary qus-type" data-type="mcq-multi"" >
                               MCQ(Multiple Answers)
                           </button>
                           <button href="#" class="btn btn-secondary qus-type" data-type="mcq-yesno"">
                               Yes/No/Not Given
                           </button>
                           <button href="#" class="btn btn-secondary qus-type" data-type="mcq-input"">
                              Student Input
                           </button> -->
                           <?php include('choices/mcq.php') ?>
                           <?php include('choices/mcq-multi.php') ?>
                           <?php include('choices/yesno.php') ?>
                           <?php include('choices/user-input.php') ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>



    
</div>

