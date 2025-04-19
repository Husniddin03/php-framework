<?php $this->view('common/header'); ?>

<div class="upload">
    <?php if ($topic == null): ?>
        <form method="post" style="width: 50rem;" action="/quiz/create" class="container-fileupload">

            <input name="topic" type="text" class="input-url" placeholder="Enter topic" require>

            <div class="buttons">
                <button type="submit" class="button apply">Apply</button>
            </div>
        </form>
    <?php else: ?>
        <form method="post" style="width: 50rem;" action="/quiz/create" class="container-fileupload">

            <input name="question" type="text" class="input-url" placeholder="Enter topic" require>
            <input name="option1" type="text" class="input-url" placeholder="Enter topic" require>
            <input name="option2" type="text" class="input-url" placeholder="Enter topic">
            <input name="option3" type="text" class="input-url" placeholder="Enter topic">
            <input name="option4" type="text" class="input-url" placeholder="Enter topic">
            <input name="option5" type="text" class="input-url" placeholder="Enter topic">
            <input name="option6" type="text" class="input-url" placeholder="Enter topic">
            <input name="option7" type="text" class="input-url" placeholder="Enter topic">
            <input name="option8" type="text" class="input-url" placeholder="Enter topic">
            <input name="option9" type="text" class="input-url" placeholder="Enter topic">
            <input name="option10" type="text" class="input-url" placeholder="Enter topic">

            <div class="buttons">
                <button type="submit" class="button apply">Apply</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php $this->view('common/footer'); ?>