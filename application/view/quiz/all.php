<?php

use application\model\User;

$this->view('common/header'); ?>

<div class="myquiz">
    <?php foreach ($quizzes as $key => $data):
        $user = User::findOne($key);
    ?>
        <h2 class="userName"><?php echo $user->name; ?></h2>
        <p class="userEmail"><?php echo $user->email; ?></p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $quiz): ?>
                    <tr>
                        <td><?php echo $quiz->id; ?></td>
                        <td class="theme"><a href="#"><?php echo $quiz->theme; ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</div>


<?php $this->view('common/footer'); ?>