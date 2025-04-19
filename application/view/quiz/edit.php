<?php $this->view('common/header'); ?>

<div class="myquiz" style="overflow: auto;">
    <table>
        <h1><?= $topic ?></h1>
        <thead>
            <tr>
                <td>Tools</td>
                <?php foreach ($questions[0] as $key => $value) {
                    if (isset($value) && $key !== 'topicId' && $key !== 'created_at') {
                        echo "<td>$key</td>";
                    }
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $key => $question): ?>
                <tr>
                    <td>

                        <div style="display: flex; justify-content: center; align-items: center;">
                            <a href='/quiz/ques_edit?id=<?= $this->get('id') ?>&question=<?= $question->id ?>'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil">
                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                    <path d="m15 5 4 4" />
                                </svg>
                            </a>

                            <form method="post" action="/quiz/delete" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                <input type="hidden" name="questionId" value="<?= $question->id ?>">
                                <button type="submit" style="background-color: transparent; color: red; border: none; padding: 5px 5px; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-delete-icon lucide-delete">
                                        <path d="M10 5a2 2 0 0 0-1.344.519l-6.328 5.74a1 1 0 0 0 0 1.481l6.328 5.741A2 2 0 0 0 10 19h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" />
                                        <path d="m12 9 6 6" />
                                        <path d="m18 9-6 6" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    <?php foreach ($question as $column => $value) {

                        if (isset($value) && $column !== 'topicId' && $column !== 'created_at' && $column !== 'id') {
                            echo "<td>$value</td>";
                        } elseif ($column == 'id') {
                            echo "<td>" . ($key + 1) . "</td>";
                        }
                    } ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </table>
</div>

<?php $this->view('common/footer'); ?>