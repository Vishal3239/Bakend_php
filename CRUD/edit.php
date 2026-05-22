<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Edit</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .edit-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 520px;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .header-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e6f1fb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .card-header h2 {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 2px;
        }

        .card-header p {
            font-size: 12px;
            color: #888;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 12px;
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        input:focus { border-color: #185FA5; }

        /* Current photo box */
        .current-photo-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f5f7fa;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1.25rem;
        }

        .current-photo-box img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .current-photo-box p { font-size: 13px; font-weight: 600; color: #1a1a1a; margin-bottom: 2px; }
        .current-photo-box span { font-size: 11px; color: #888; }

        /* Dropzone */
        .dropzone {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            margin-bottom: 1.25rem;
        }

        .dropzone:hover { border-color: #185FA5; }
        .dropzone .drop-icon { font-size: 28px; display: block; margin-bottom: 6px; }
        .dropzone p { font-size: 13px; color: #555; margin-bottom: 3px; }
        .dropzone span { font-size: 11px; color: #aaa; }

        /* New photo preview */
        .new-photo-preview {
            display: none;
            align-items: center;
            gap: 10px;
            background: #f5f7fa;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1.25rem;
        }

        .new-photo-preview img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .new-photo-preview span { font-size: 13px; color: #333; flex: 1; }
        .new-photo-preview .remove { cursor: pointer; color: #aaa; font-size: 18px; background: none; border: none; }

        /* Buttons */
        .btn-row { display: flex; align-items: center; gap: 12px; }

        .btn-update {
            padding: 10px 24px;
            background: #185FA5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-update:hover { background: #0c447c; }

        .btn-cancel {
            font-size: 13px;
            color: #888;
            text-decoration: none;
        }

        .btn-cancel:hover { color: #333; }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud")
        or die("Connection failed");

$id     = $_GET['id'];
$sql    = "SELECT * FROM `Students` WHERE `S_id` = $id";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);
?>

<div class="edit-card">

    <div class="card-header">
        <div class="header-icon">✏️</div>
        <div>
            <h2>Student update page</h2>
            <p>Chang datils and update</p>
        </div>
    </div>

    <form action="update.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id"        value="<?php echo $row['S_id']; ?>">
        <input type="hidden" name="old_photo" value="<?php echo $row['Image']; ?>">

        <div class="form-grid">
            <div>
                <label>👤 Name</label>
                <input type="text" name="naam" value="<?php echo $row['Name']; ?>" required>
            </div>
            <div>
                <label>✉️ Email</label>
                <input type="email" name="email" value="<?php echo $row['Email']; ?>" required>
            </div>
            <div>
                <label>🎂 Age</label>
                <input type="number" name="age" value="<?php echo $row['Age']; ?>" required>
            </div>
        </div>

        <!-- Current Photo -->
        <label>Current photo</label>
        <div class="current-photo-box">
            <img src="uploads/<?php echo $row['Image']; ?>"
                 onerror="this.style.display='none'">
            <div>
                <p><?php echo $row['Image']; ?></p>
                <span>Current image</span>
            </div>
        </div>

        <!-- Nayi Photo -->
        <label>New photo (optional)</label>
        <div class="dropzone" onclick="document.getElementById('photoInput').click()">
            <span class="drop-icon">📷</span>
            <p>Choose New Image</p>
            <span>JPG, PNG — max 2MB</span>
        </div>
        <input type="file" id="photoInput" name="photo" accept="image/*"
               style="display:none" onchange="showNewPhoto(this)">

        <div class="new-photo-preview" id="newPhotoPreview">
            <img id="newPhotoImg" src="">
            <span id="newPhotoName"></span>
            <button type="button" class="remove" onclick="clearPhoto()">✕</button>
        </div>

        <div class="btn-row">
            <button type="submit" class="btn-update">✅ Update karo</button>
            <a href="index.php" class="btn-cancel">← Cancel</a>
        </div>

    </form>
</div>

<script>
function showNewPhoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('newPhotoImg').src = e.target.result;
            document.getElementById('newPhotoName').textContent = input.files[0].name;
            document.getElementById('newPhotoPreview').style.display = 'flex';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function clearPhoto() {
    document.getElementById('photoInput').value = '';
    document.getElementById('newPhotoPreview').style.display = 'none';
}
</script>

</body>
</html>