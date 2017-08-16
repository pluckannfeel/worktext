<fieldset>
  <input type="hidden" name="type" value="tf" />
  
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="question">Question:</label>
  <div class="col-md-8">
  <input id="question" name="question" type="text" placeholder="Question" class="form-control input-md" required="">

  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="answer">Correct Answer</label>
  <div class="col-md-4">
    <label class="radio-inline" for="answer-0">
      <input type="radio" name="answer" id="answer-0" value="true" checked="checked">
      True
    </label>
    <label class="radio-inline" for="answer-1">
      <input type="radio" name="answer" id="answer-1" value="false">
      False
    </label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-default">Add Question</button>
  </div>
</div>

</fieldset>
