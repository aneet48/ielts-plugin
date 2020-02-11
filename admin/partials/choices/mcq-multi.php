<?php
$section_id = $_GET['section_id']
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MCQModalMulti<?php echo $section_id ?>">
    MCQ (Multiple Answers)
</button>

<!-- Modal -->
<div class="modal fade" id="MCQModalMulti<?php echo $section_id ?>" tabindex="-1" role="dialog" aria-labelledby="MCQModalMulti<?php echo $section_id ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MCQModalMulti<?php echo $section_id ?>Label">MCQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="form-group">
                    <label for="">Question(Add question below)</label>
                    <input class="input-ele" type="text" name="qus" class="form-control">
                </div> -->
                <div class="form-group">
                    <label for="">Options (Select answer from options)</label>
                    <table class="options-table table borderless">
                        <tbody>
                            <tr>
                                <th>Option</th>
                                <th>Remove</th>
                            </tr>
                            <tr>
                                <td>
                                    <input class="input-ele" type="text" name="option" data-id="1">
                                </td>
                                <!-- <td>
                                    <input class="input-ele" type="radio" name="answer" id="" data-id="1">
                                </td> -->
                                <td>
                                    <span class="dashicons dashicons-no"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="input-ele" type="text" name="option" data-id="2">
                                </td>
                                <!-- <td>
                                    <input class="input-ele" type="radio" name="answer" id="" data-id="2">
                                </td> -->
                                 <td>
                                    <span class="dashicons dashicons-no"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="input-ele" type="text" name="option" data-id="3">
                                </td>
                                <!-- <td>
                                    <input class="input-ele" type="radio" name="answer" id="" data-id="3">
                                </td> -->
                                 <td>
                                    <span class="dashicons dashicons-no"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary float-right mcq-add-more" > Add More</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary qus-choice" data-qus-type="mcq-multi" >Save</button>
            </div>
        </div>
    </div>
</div>