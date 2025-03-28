<?php $this->view('common/header'); ?>

<div class="myquiz">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Topic</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?= $quiz->id; ?></td>
                    <td class="theme"><a href="/quiz/test?id=<?= $quiz->id ?>"><?= $quiz->theme; ?></a></td>
                    <td><a href="/quiz/form?id=<?= $quiz->id; ?>">Start quiz</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </table>
</div>

<?php $this->view('common/footer'); ?>