<?php $this->view('common/header'); ?>

<div class="upload">
    <form method="post" style="width: 50rem;" action="/quiz/upload" class="container-fileupload" enctype="multipart/form-data">

        <textarea name="pase" type="text" class="textarea-box" placeholder="Enter topic"></textarea>

        <div id="fileInfo" class="file-info" style="display: none;">
            <span id="fileName"></span>
            <span id="fileSize"></span>
        </div>

        <input name="topic" type="text" class="input-url" placeholder="Enter topic">
        <input name="question" type="text" class="input-url" placeholder="Difference in questions">
        <input name="option" type="text" class="input-url" placeholder="Difference in option">
        <input name="correct" type="text" class="input-url" placeholder="Correct answer">

        <div class="buttons">
            <button type="submit" class="button apply">Apply</button>
        </div>
    </form>
</div>

<?php $this->view('common/footer'); ?>