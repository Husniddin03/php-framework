<?php $this->view('common/header'); ?>

<form action="/quiz/check" method="post" class="exam" id="quizForm">
    <div class="header-exam"><?= $topic->theme ?></div>
    <input type="hidden" name="answers" value="<?= base64_encode(serialize($question)) ?>">

    <div class="main-exam">
        <div class="left-section-exam">
            <?php
            $total = 0;
            foreach ($question as $index => $value):
                if ($value->question == null) continue;
                $total++;
            ?>
                <div class="card-exam question-block" id="q<?= $index ?>" style="display: none;">
                    <p><?= $index + 1 . ". " . $value->question ?></p>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        if ($value->{'option' . $i} == null) break;
                        echo '<label><input type="radio" name="' . $value->id . '" value="' . $value->{'option' . $i} . '" onclick="nextQuestion()">' . $value->{'option' . $i} . '</label>';
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="right-section-exam">
            <div class="answer-box">
                <p class="answer-title">Vaqt</p>
                <div id="time" style="font-size: 20px;">00:00</div>
                <button type="submit" class="finish-btn-exam"><span>Yakunlash</span></button>
            </div>
        </div>
    </div>
</form>

<script>
    const questions = document.querySelectorAll('.question-block');
    const form = document.getElementById('quizForm');
    const timeElement = document.getElementById("time");
    const timePerQuestion = <?= $time ?>; // har bir savolga 30 soniya
    let currentIndex = 0;
    let timer;
    let remaining = timePerQuestion;

    function startTimer() {
        remaining = timePerQuestion;
        updateTimerDisplay();
        timer = setInterval(() => {
            remaining--;
            updateTimerDisplay();
            if (remaining <= 0) {
                nextQuestion();
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const m = String(Math.floor(remaining / 60)).padStart(2, '0');
        const s = String(remaining % 60).padStart(2, '0');
        timeElement.textContent = `${m}:${s}`;
    }

    function showQuestion(index) {
        questions.forEach((q, i) => {
            q.style.display = i === index ? 'block' : 'none';
        });
    }

    function nextQuestion() {
        clearInterval(timer);

        if (currentIndex < questions.length - 1) {
            currentIndex++;
            showQuestion(currentIndex);
            startTimer();
        } else {
            document.querySelector(".finish-btn-exam").style.display = "block";
            form.submit();
        }
    }

    // boshlanish
    window.addEventListener('DOMContentLoaded', () => {
        showQuestion(currentIndex);
        startTimer();
    });
</script>

<?php $this->view('common/footer'); ?>