<fieldset>
<input type="hidden" name="type" value="mc" />

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="question">Question</label>
  <div class="col-md-8">
  <input id="question" name="question" type="text" placeholder="Question" class="form-control input-md" required="">
  <span class="help-block">Note: Check the button (after the text) if the choice is the correct answer.</span>
  </div>
</div>

<!-- Appended checkbox -->
<div class="form-group">
  <label class="col-md-4 control-label" for="choice_a">Choice A:</label>
  <div class="col-md-6">
    <div class="input-group">
      <input id="choice_a" name="choice_a" class="form-control" type="text" placeholder="Choice A" required="">
	        <span class="input-group-addon">
          <input type="radio" name="isCorrect" id="answer1" value="a">
      </span>
    </div>

  </div>
</div>

<!-- Appended checkbox -->
<div class="form-group">
  <label class="col-md-4 control-label" for="choice_b">Choice B:</label>
  <div class="col-md-6">
    <div class="input-group">
      <input id="choice_b" name="choice_b" class="form-control" type="text" placeholder="Choice B" required="">
	        <span class="input-group-addon">
          <input type="radio" name="isCorrect" id="answer2" value="b">
      </span>
    </div>

  </div>
</div>

<!-- Appended checkbox -->
<div class="form-group">
  <label class="col-md-4 control-label" for="choice_c">Choice C:</label>
  <div class="col-md-6">
    <div class="input-group">
      <input id="choice_c" name="choice_c" class="form-control" type="text" placeholder="Choice C" required="">
	        <span class="input-group-addon">
          <input type="radio" name="isCorrect" id="answer3" value="c">
      </span>
    </div>

  </div>
</div>

<!-- Appended checkbox -->
<div class="form-group">
  <label class="col-md-4 control-label" for="choice_d">Choice D:</label>
  <div class="col-md-6">
    <div class="input-group">
      <input id="choice_d" name="choice_d" class="form-control" type="text" placeholder="Choice D" required="">
	        <span class="input-group-addon">
          <input type="radio" name="isCorrect" id="answer4" value="d">
      </span>
    </div>

  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Add Question</button>
  </div>
</div>

</fieldset>
