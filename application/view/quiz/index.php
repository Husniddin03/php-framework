<?php $this->view('common/header'); ?>

<div class="myquiz">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Topic</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?php echo $quiz->id; ?></td>
                    <td class="theme"><a href="/quiz/test?id=<?= $quiz->id ?>"><?php echo $quiz->theme; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </table>
</div>

<?php $this->view('common/footer'); ?>