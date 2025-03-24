<?php $this->view('common/header'); ?>

<div class="upload">
    <form method="post" action="/quiz/upload" class="container-fileupload" enctype="multipart/form-data">
        <h3>Upload Resume & Portfolio</h3>
        <p style="color: #bbb; font-size: 14px; margin-top: 1rem;"></p>

        <div class="upload-box" onclick="document.getElementById('fileInput').click()">
            <p>Drag & Drop or <span style="color: #ff416c; text-decoration: underline; cursor: pointer;">Choose file</span></p>
            <p style="font-size: 12px; color: #777;">TXT Max 3.0Mb</p>
        </div>
        <input name="file" accept=".txt" type="file" id="fileInput" style="display: none;" accept="application/txt" onchange="handleFileUpload()">

        <div id="fileInfo" class="file-info" style="display: none;">
            <span id="fileName"></span>
            <span id="fileSize"></span>
        </div>

        <p style="color: #888; font-size: 14px;">or</p>
        <input name="question" type="text" class="input-url" placeholder="Difference in questions">
        <input name="option" type="text" class="input-url" placeholder="Difference in option">
        <input name="correct" type="text" class="input-url" placeholder="Correct answer">

        <div class="buttons">
            <button type="submit" class="button apply">Apply</button>
        </div>
    </form>
</div>

<?php $this->view('common/footer'); ?>