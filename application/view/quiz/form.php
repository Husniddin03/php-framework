<?php $this->view('common/header'); ?>

<div class="test-form">
    <div class="container-quiz-form">
        <form id="testForm" action="/quiz/quiz" method="post">
            <h2><input hidden type="number" name="topicId" value="<?= $topicName->id ?>"><?= $topicName->theme ?></h2>

            <div class="toggle-group">
                <input type="radio" id="startFromBeginning" name="order" value="beginning" checked>
                <label for="startFromBeginning">Start from Beginning</label>
                <input type="radio" id="shuffleQuestions" name="order" value="shuffle">
                <label for="shuffleQuestions">Shuffle Questions</label>
            </div>

            <div class="form-group">
                <label for="testStart">Test start:</label>
                <input value="1" name="start" type="number" id="testStart" min="1" max="<?= $count ?>" placeholder="Test start" required>
            </div>

            <div class="form-group">
                <label for="testCount">Number of Tests: max: <?= $count ?></label>
                <input name="number" type="number" id="testCount" min="1" max="<?= $count ?>" placeholder="Enter number of tests" required>
            </div>

            <div class="form-group">
                <label for="timePerTest">Time per Test (seconds):</label>
                <input name="time" type="number" id="timePerTest" min="1" placeholder="Enter time per test" required>
            </div>

            <div class="form-group">
                <label for="testType">Test Type:</label>
                <select name="type" id="testType" required>
                    <option value="immediately">Immediately</option>
                    <option value="multiple">Multiple Choice</option>
                </select>
            </div>

            <button type="submit">Start Test</button>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startInputGroup = document.querySelectorAll('.form-group')[0]; // "Test start" divi
        const radioButtons = document.querySelectorAll('input[name="order"]');

        function toggleTestStartVisibility() {
            const selectedValue = document.querySelector('input[name="order"]:checked').value;
            if (selectedValue === 'shuffle') {
                startInputGroup.style.display = 'none';
            } else {
                startInputGroup.style.display = 'block';
            }
        }

        radioButtons.forEach(radio => {
            radio.addEventListener('change', toggleTestStartVisibility);
        });

        // Sahifa yuklanganda holatini tekshirish
        toggleTestStartVisibility();
    });
</script>


<?php $this->view('common/footer'); ?>