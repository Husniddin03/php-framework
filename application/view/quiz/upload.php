<?php $this->view('common/header'); ?>

<div class="upload">
    <div class="container-fileupload">
        <h3>Upload Resume & Portfolio</h3>
        <p style="color: #bbb; font-size: 14px;">Apply for this job in a few clicks by uploading your updated resume and portfolio.</p>

        <div class="upload-box" onclick="document.getElementById('fileInput').click()">
            <p>Drag & Drop or <span style="color: #ff416c; text-decoration: underline; cursor: pointer;">Choose file</span></p>
            <p style="font-size: 12px; color: #777;">TXT Max 3.0Mb</p>
        </div>
        <input accept=".txt" type="file" id="fileInput" style="display: none;" accept="application/txt" onchange="handleFileUpload()">

        <div id="fileInfo" class="file-info" style="display: none;">
            <span id="fileName"></span>
            <span id="fileSize"></span>
        </div>

        <p style="color: #888; font-size: 14px;">or</p>
        <input type="text" class="input-url" placeholder="Add file URL here">

        <div class="buttons">
            <button class="button cancel">Cancel</button>
            <button class="button apply">Apply Job</button>
        </div>
    </div>
</div>

<?php $this->view('common/footer'); ?>