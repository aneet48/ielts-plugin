<?php
$ans = isset($test_data) && isset($test_data['answers']) ? json_decode($test_data['answers'] ): null;
$length = $ans && is_array($ans) ? count($ans) : 40
?>
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
                     for ($i=1; $i <= $length ; $i++) { ?>
                 <div class="col-md-4 ans-block">

                     <div class="row ">
                         <label for="" class="col-sm-2"><?php echo $i ?></label>
                         <input type="text" name="ans[]" class="form-control col-sm-10" value="<?php echo isset($ans[$i-1]) ? $ans[$i-1]:'' ?>">
                     </div> 
                 </div>
                 <?php }
                   ?>
             </div>

             <div class="block">
                 <a href="#" class="btn btn-primary add-more-ans">Add More Answer</a>
             </div>
         </div>
     </div>
 </div>