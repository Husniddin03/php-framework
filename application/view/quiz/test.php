<?php $this->view('common/header'); ?>

<body translate="no">
    <div class="container-quiz">
        <h1>Movie Quiz</h1>
        <div id="" class="text-center jumbotron">
            <?php foreach ($data as $item => $value): ?>
                <h3 id="question"><?= $value->question ?></h3>
                <div class="list">
                    <?php
                    foreach ($value as $key => $question) {
                        if ($question !== null && strpos($key, 'option') !== false) {
                            echo '<div class="questions" id="q' . $item . $key . '">' . $question . '</div>';
                        }
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        
    </script>
</body>

<?php $this->view('common/footer'); ?>