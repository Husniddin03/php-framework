<?php $this->view('common/header'); ?>

<form action="/quiz/check" method="post" class="exam">
    <div class="header-exam"><?= $topic->theme ?></div>
    <input type="hidden" name="answers" value="<?= base64_encode(serialize($question)) ?>">

    <div class="main-exam">
        <div class="left-section-exam">
            <?php $count = 0;
            foreach ($question as $key => $value): ?>
                <?php
                if ($value->question == null) {
                    $count++;
                    continue;
                }
                ?>
                <div class="card-exam">
                    <p id="question<?= $key + 1 ?>"><?= $key + 1 . ". " . $value->question ?></p>

                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        if ($value->{'option' . $i} == null) {
                            break;
                        } else {
                            echo '<label><input value="' . $value->{'option' . $i} . '" type="radio" name="' . $value->id . '" onclick="selectAnswer(' . $key + 1 . ')">' . $value->{'option' . $i} . '</label>';
                        }
                    }
                    ?>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="right-section-exam">
            <div class="answer-box">
                <p class="answer-title">Javoblar</p>
                <div class="circles">

                    <?php
                    for ($i = 1; $i <= count($question) - $count; $i++) {
                        echo '<a href="#question' . $i . '" style="color:black;" class="circle" id="c' . $i . '">' . $i . '</a>';
                    }
                    ?>

                </div>
                <button type="submit" class="finish-btn-exam"><span>Yakunlash</span> <span id="time"><?= $time ?></span></button>
            </div>
        </div>
    </div>
</form>

<script>
    function selectAnswer(questionNum, name) {
        const circle = document.getElementById('c' + questionNum);
        if (circle) {
            circle.classList.add('active-exam');
        }
    }
</script>

<script>
    const form = document.querySelector("form.exam");
    const timeElement = document.getElementById("time");
    let totalSeconds;

    // Vaqtni localStorage'dan o'qish yoki yangidan olish
    if (localStorage.getItem('remainingTime')) {
        totalSeconds = parseInt(localStorage.getItem('remainingTime'), 10);
    } else {
        totalSeconds = <?= $time ?>;
        localStorage.setItem('remainingTime', totalSeconds);
    }

    function updateTimer() {
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        timeElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (totalSeconds <= 0) {
            clearInterval(timerInterval);
            localStorage.removeItem('remainingTime');
            localStorage.removeItem('selectedAnswers');
            form.submit(); // avtomatik yuboriladi
        } else {
            totalSeconds--;
            localStorage.setItem('remainingTime', totalSeconds);
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer();

    // Variant tanlanganda localStorage ga saqlash
    function selectAnswer(questionNum) {
        const circle = document.getElementById('c' + questionNum);
        if (circle) {
            circle.classList.add('active-exam');
        }

        // Barcha variantlarni tekshirib saqlaymiz
        const inputs = document.querySelectorAll('input[type="radio"]:checked');
        const answers = {};
        inputs.forEach(input => {
            answers[input.name] = input.value;
        });

        localStorage.setItem('selectedAnswers', JSON.stringify(answers));
    }

    // Sahifa yuklanganda tanlangan variantlarni tiklash
    window.addEventListener('DOMContentLoaded', () => {
        const savedAnswers = JSON.parse(localStorage.getItem('selectedAnswers') || '{}');
        Object.keys(savedAnswers).forEach(name => {
            const value = savedAnswers[name];
            const input = document.querySelector(`input[type="radio"][name="${name}"][value="${value}"]`);
            if (input) {
                input.checked = true;
                const qIndex = [...document.querySelectorAll('input[type="radio"]')].findIndex(el => el === input);
                selectAnswer(qIndex + 1);
            }
        });
    });

    // Form yuborilganda localStorage tozalanadi
    form.addEventListener('submit', () => {
        localStorage.removeItem('remainingTime');
        localStorage.removeItem('selectedAnswers');
    });
</script>

<?php $this->view('common/footer'); ?>