<?php $this->view('common/header'); ?>

<div class="myquiz" style="overflow: auto;">
    <table>
        <thead>
            <tr>
                <?php foreach ($questions as $key => $value) {
                    if (isset($value) && $key !== 'topicId' && $key !== 'created_at' && $key !== 'id') {
                        echo "<td>$key</td>";
                    }
                } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="/quiz/editTools" method="post">
                    <input name="id" type="number" value="<?= $id ?>" hidden>
                    <input name="questionId" type="number" value="<?= $questions->id ?>" hidden>
                    <?php foreach ($questions as $key => $value) {
                        if (isset($value) && $key !== 'topicId' && $key !== 'created_at' && $key !== 'id') {
                            echo '<td><textarea name="' . $key . '" style="hight:auto;" type="text" class="textarea-box" placeholder="Enter">' . $value . '</textarea></td>';
                        }
                    } ?>
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Apply</button>
                    <a href="#" style="background-color:rgb(9, 9, 9); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Close</a>
                </form>
            </tr>
        </tbody>
    </table>
    </table>
</div>

<?php $this->view('common/footer'); ?>