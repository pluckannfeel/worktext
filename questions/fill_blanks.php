<fieldset>
<input type="hidden" name="type" value="fb" />

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="question">Question:</label>
  <div class="col-md-8">
  <input id="question" name="question" type="text" placeholder="Question" class="form-control input-md" required="">
  <span class="help-block">Note: Do not use special characters including '' and "" when answering.</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="answer">Correct Answer</label>
  <div class="col-md-5">
  <input id="answer" name="answer" type="text" placeholder="Answer" class="form-control input-md" required="">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-info">Add Question</button>
  </div>
</div>

</fieldset>
