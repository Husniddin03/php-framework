<?php $this->view('common/header'); ?>

<div class="upload">
    <?php if ($topic == 'open'): ?>
        <form method="post" style="width: 50rem;" action="/quiz/create" class="container-fileupload">

            <input name="topic" type="text" class="input-url" placeholder="Enter topic" require>

            <div class="buttons">
                <button type="submit" class="button apply">Apply</button>
            </div>
        </form>
    <?php else: ?>
        <form method="post" style="width: 50rem;" action="/quiz/create" class="container-fileupload">
            <h1><?= $topic ?></h1>
            <input type="text" value="<?= $id ?>" name="id" hidden>
            <input name="question" type="text" class="input-url" placeholder="<?= $questionId + 1 ?>: Enter question" required>
            <h3>Options</h3>
            <div id="options-container">
                <div class="option-item">
                    <input name="option1" type="text" class="input-url" placeholder="Enter option1" required>
                    <label>
                        <input type="radio" name="answer" value="1">
                    </label>
                </div>
            </div>

            <button type="button" id="add-option-btn" class="button">Qo‘shish</button>

            <div class="buttons">
                <button type="submit" class="button apply">Apply</button>
            </div>
        </form>

    <?php endif; ?>
</div>


<script>
    let optionCount = 1;
    const maxOptions = 10;

    document.getElementById('add-option-btn').addEventListener('click', function() {
        if (optionCount < maxOptions) {
            optionCount++;
            const container = document.getElementById('options-container');

            const optionDiv = document.createElement('div');
            optionDiv.className = 'option-item';

            const newInput = document.createElement('input');
            newInput.name = 'option' + optionCount;
            newInput.type = 'text';
            newInput.className = 'input-url';
            newInput.placeholder = 'Enter option' + optionCount;

            const radioLabel = document.createElement('label');
            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = 'answer';
            radio.value = optionCount;
            radioLabel.appendChild(radio);

            optionDiv.appendChild(newInput);
            optionDiv.appendChild(radioLabel);

            container.appendChild(optionDiv);

            if (optionCount === maxOptions) {
                this.style.display = 'none';
            }
        }
    });
</script>

<style>
    .option-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .option-item input[type="text"] {
        flex: 1;
    }
</style>

<?php $this->view('common/footer'); ?>