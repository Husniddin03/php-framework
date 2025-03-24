<?php $this->view('common/header'); ?>

<body translate="no">
    <div class="container-quiz">
        <h1>Movie Quiz</h1>
        <div id="" class="text-center jumbotron">
            <?php foreach ($data as $value): ?>
                <h3 id="question"><?= $value->question ?></h3>
                <div class="list">
                    <div class="questions" id="q1"><?= $value->answer ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<?php $this->view('common/footer'); ?>