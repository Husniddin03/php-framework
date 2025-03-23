<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resume</title>
    <style>
        body {
            background: radial-gradient(circle, #1a1a1a, #0d0d0d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
        }

        .container {
            background: #151515;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            width: 380px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .upload-box {
            border: 2px dashed rgba(255, 255, 255, 0.3);
            padding: 20px;
            cursor: pointer;
            border-radius: 12px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .upload-box:hover {
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.05);
        }

        .file-info {
            background: #222;
            padding: 12px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #bbb;
        }

        .input-url {
            width: 100%;
            padding: 10px;
            border: none;
            background: #222;
            color: white;
            border-radius: 8px;
            margin: 10px 0;
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 48%;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        .cancel {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .apply {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            color: white;
        }

        button:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Upload Resume & Portfolio</h3>
        <p style="color: #bbb; font-size: 14px;">Apply for this job in a few clicks by uploading your updated resume and portfolio.</p>

        <div class="upload-box" onclick="document.getElementById('fileInput').click()">
            <p>Drag & Drop or <span style="color: #ff416c; text-decoration: underline; cursor: pointer;">Choose file</span></p>
            <p style="font-size: 12px; color: #777;">PDF Max 3.0Mb</p>
        </div>
        <input type="file" id="fileInput" style="display: none;" accept="application/txt" onchange="handleFileUpload()">

        <div id="fileInfo" class="file-info" style="display: none;">
            <span id="fileName"></span>
            <span id="fileSize"></span>
        </div>

        <p style="color: #888; font-size: 14px;">or</p>
        <input type="text" class="input-url" placeholder="Add file URL here">

        <div class="buttons">
            <button class="cancel">Cancel</button>
            <button class="apply">Apply Job</button>
        </div>
    </div>

    <script>
        function handleFileUpload() {
            const fileInput = document.getElementById('fileInput');
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                fileName.textContent = file.name;
                fileSize.textContent = (file.size / 1024 / 1024).toFixed(2) + 'Mb';
                fileInfo.style.display = 'flex';
            }
        }
    </script>
</body>

</html>