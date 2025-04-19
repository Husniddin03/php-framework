<?php $this->view('common/header'); ?>

<div class="myquiz">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Topic</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?= $quiz->id; ?></td>
                    <td class="theme"><a href="/quiz/test?id=<?= $quiz->id ?>"><?= $quiz->theme; ?></a></td>
                    <td><a href="/quiz/form?id=<?= $quiz->id; ?>">Start quiz</a></td>
                    <td>
                        <a href="/quiz/edit?id=<?= $quiz->id; ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/quiz/deleteTopic" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                            <input type="hidden" name="id" value="<?= $quiz->id ?>">
                            <button type="submit" style="background-color: transparent; color: red; border: none; padding: 5px 5px; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </table>
</div>

<?php $this->view('common/footer'); ?>