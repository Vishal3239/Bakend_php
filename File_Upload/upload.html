<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .upload-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .card-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .icon-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: #e6f1fb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 26px;
        }

        .card-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .card-header p {
            font-size: 13px;
            color: #888;
        }

        .dropzone {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 2rem 1rem;
            text-align: center;
            cursor: pointer;
            margin-bottom: 1.25rem;
            transition: border-color 0.2s;
        }

        .dropzone:hover {
            border-color: #185FA5;
        }

        .dropzone .drop-icon {
            font-size: 36px;
            margin-bottom: 8px;
        }

        .dropzone p {
            font-size: 13px;
            color: #555;
            margin-bottom: 4px;
        }

        .dropzone span {
            font-size: 11px;
            color: #aaa;
        }

        /* File info box */
        .file-info {
            display: none;
            align-items: center;
            gap: 10px;
            background: #f5f7fa;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1.25rem;
        }

        .file-info .file-icon {
            font-size: 22px;
            color: #185FA5;
        }

        .file-info .file-details {
            flex: 1;
            overflow: hidden;
        }

        .file-info .file-details p {
            font-size: 13px;
            font-weight: 600;
            color: #1a1a1a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 2px;
        }

        .file-info .file-details span {
            font-size: 11px;
            color: #888;
        }

        .file-info .remove-btn {
            font-size: 18px;
            color: #aaa;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .file-info .remove-btn:hover {
            color: #e24b4a;
        }

        /* Hidden real input */
        #fileInput {
            display: none;
        }

        .btn-upload {
            width: 100%;
            padding: 12px;
            background-color: #185FA5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-upload:hover {
            background-color: #0c447c;
        }
    </style>
</head>
<body>

    <div class="upload-card">

        <div class="card-header">
            <div class="icon-circle">📤</div>
            <h2>File upload karein</h2>
            <p>Apni file select karke upload karein</p>
        </div>

        <form action="upload.php" method="POST" enctype="multipart/form-data">

            <!-- Dropzone click karne par hidden input open hoga -->
            <div class="dropzone" onclick="document.getElementById('fileInput').click()">
                <div class="drop-icon">📁</div>
                <p>File yahan click karke choose karein</p>
                <span>JPG, PNG, PDF — max 2MB</span>
            </div>

            <!-- Real file input (hidden) -->
            <input type="file" id="fileInput" name="file" onchange="showFile(this)">

            <!-- File select hone par yeh dikhega -->
            <div class="file-info" id="fileInfo">
                <span class="file-icon">✅</span>
                <div class="file-details">
                    <p id="fileName"></p>
                    <span id="fileSize"></span>
                </div>
                <button type="button" class="remove-btn" onclick="clearFile()">✕</button>
            </div>

            <button type="submit" class="btn-upload">📤 Upload karo</button>

        </form>

    </div>

    <script>
        function showFile(input) {
            if (input.files && input.files[0]) {
                var file = input.files[0];
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = (file.size / 1024).toFixed(1) + ' KB';
                document.getElementById('fileInfo').style.display = 'flex';
            }
        }

        function clearFile() {
            document.getElementById('fileInput').value = '';
            document.getElementById('fileInfo').style.display = 'none';
        }
    </script>

</body>
</html>