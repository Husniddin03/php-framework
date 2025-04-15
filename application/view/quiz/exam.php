<?php $this->view('common/header'); ?>

<form action="/quiz/check" method="post" class="exam">
    <div class="header-exam">1-ma'ruza mashg'uloti.</div>
    <input type="hidden" name="answers" value="<?= base64_encode(serialize($question)) ?>">

    <div class="main-exam">
        <div class="left-section-exam">
            <?php foreach ($question as $key => $value): ?>

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
                    for ($i = 1; $i <= count($question); $i++) {
                        echo '<a href="#question' . $i . '" style="color:black;" class="circle" id="c' . $i . '">' . $i . '</a>';
                    }
                    ?>

                </div>
                <button type="submit" class="finish-btn-exam">Yakunlash</button>
            </div>
        </div>
    </div>

    <script>
        function selectAnswer(questionNum, name) {
            const circle = document.getElementById('c' + questionNum);
            if (circle) {
                circle.classList.add('active-exam');
            }
        }
    </script>
</form>

<?php $this->view('common/footer'); ?>