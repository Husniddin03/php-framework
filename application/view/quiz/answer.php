<?php $this->view('common/header'); ?>

<div class="exam">
    <div class="header-exam"><?= $topic ?></div>
    <div class="main-exam">
        <div class="left-section-exam">
            <?php
            $trash = [];
            $count = 0;
            foreach ($result as $key => $value): ?>

                <div class="card-exam">
                    <p id="question<?= $key + 1 ?>"><?= $key + 1 . ". " . $value['question'] ?></p>

                    <?php
                    if ($value['useranswer'] == $value['answer']) {
                        $count++;
                        $trash[$key + 1] = 'green';
                        echo '<label class="exam-lable" style="color:green;" onclick="selectAnswer(' . $key + 1 . ')">' . $value['answer'] . '</label>';
                    } else {
                        $trash[$key + 1] = 'red';
                        echo '<label class="exam-lable" style="color:green;" onclick="selectAnswer(' . $key + 1 . ')">' . $value['answer'] . '</label>';
                        echo '<label class="exam-lable" style="color:red;" onclick="selectAnswer(' . $key + 1 . ')">' . $value['useranswer'] . '</label>';
                    }
                    ?>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="right-section-exam">
            <div class="answer-box">
                <p class="answer-title">
                    <span>Javoblar</span>
                    <?php
                    if ($count / count($result) >= 0.6) {
                        echo '<span style="color:green;">' . $count . '/' . count($result) . "</span> <span> " . round($count / count($result) * 100, 2) . '%</span>';
                    } else {
                        echo '<span style="color:red;">' . $count . '/' . count($result) . "</span> <span>" . round($count / count($result) * 100, 2) . '%</span>';
                    }
                    ?>
                </p>
                <div class="circles">

                    <?php
                    for ($i = 1; $i <= count($trash); $i++) {
                        echo '<a href="#question' . $i . '" style="color:black; background-color: ' . $trash[$i] . ';" class="circle" id="c' . $i . '">' . $i . '</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('common/footer'); ?>