<?php $this->view('common/header'); ?>

<div class="test-form">
    <div class="container-quiz-form">
        <h2>Test Settings</h2>
        <form id="testForm">
            <div class="form-group">
                <label for="testCount">Number of Tests:</label>
                <input type="number" id="testCount" min="1" placeholder="Enter number of tests" required>
            </div>
            <div class="form-group">
                <label for="timePerTest">Time per Test (minutes):</label>
                <input type="number" id="timePerTest" min="1" placeholder="Enter time per test" required>
            </div>
            <div class="form-group">
                <label for="testType">Test Type:</label>
                <select id="testType" required>
                    <option value="mcq">Multiple Choice</option>
                    <option value="written">Written</option>
                    <option value="mixed">Mixed</option>
                </select>
            </div>
            <div class="toggle-group">
                <input type="radio" id="startFromBeginning" name="order" value="beginning" checked>
                <label for="startFromBeginning">Start from Beginning</label>
                <input type="radio" id="shuffleQuestions" name="order" value="shuffle">
                <label for="shuffleQuestions">Shuffle Questions</label>
            </div>
            <button type="submit">Start Test</button>
        </form>
    </div>
</div>

<?php $this->view('common/footer'); ?>