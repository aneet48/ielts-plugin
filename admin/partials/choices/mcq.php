<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MCQModal">
    MCQ
</button>

<!-- Modal -->
<div class="modal fade" id="MCQModal" tabindex="-1" role="dialog" aria-labelledby="MCQModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MCQModalLabel">MCQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Question(Add question below)</label>
                    <input type="text" name="qus" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Options (Select answer from options)</label>
                    <table class="options-table table borderless">
                        <tbody>
                            <tr>
                                <th>Option</th>
                                <th>Answer</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="option" data-id="1">
                                </td>
                                <td>
                                    <input type="radio" name="answer" id="" data-id="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="option" data-id="2">
                                </td>
                                <td>
                                    <input type="radio" name="answer" id="" data-id="2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="option" data-id="3">
                                </td>
                                <td>
                                    <input type="radio" name="answer" id="" data-id="3">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary">Add More</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>