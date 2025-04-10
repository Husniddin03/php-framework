<?php $this->view('common/header'); ?>

<div class="exam">
    <div class="header-exam">1-ma'ruza mashg'uloti.</div>

    <div class="main-exam">
        <div class="left-section-exam">
            <div class="card-exam">
                <p>1. Какой элемент компьютерной системы используется для временного хранения данных?</p>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> I/O</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> CPU</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> RAM</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> ROM</label>
            </div>
        </div>

        <div class="right-section-exam">
            <div class="answer-box">
                <p class="answer-title">Javoblar</p>
                <div class="circles">
                    <span class="circle" id="c1">1</span>
                    <span class="circle" id="c2">2</span>
                    <span class="circle" id="c3">3</span>
                    <span class="circle" id="c4">4</span>
                    <span class="circle" id="c5">5</span>
                    <span class="circle" id="c6">6</span>
                </div>
                <button class="finish-btn-exam">Yakunlash</button>
            </div>
        </div>
    </div>

    <script>
        function selectAnswer(questionNum) {
            const circle = document.getElementById('c' + questionNum);
            if (circle) {
                circle.classList.add('active-exam');
            }
        }
    </script>
</div>

<?php $this->view('common/footer'); ?>