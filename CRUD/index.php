<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h2 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 1.25rem;
        }

        /* Card */
        .card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Form grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 12px;
            margin-bottom: 12px;
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

        input:focus {
            border-color: #185FA5;
        }

        /* Dropzone */
        .dropzone {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 14px;
            text-align: center;
            cursor: pointer;
            font-size: 13px;
            color: #888;
            margin-bottom: 12px;
        }

        .dropzone:hover {
            border-color: #185FA5;
        }

        /* Image preview */
        .img-preview {
            display: none;
            align-items: center;
            gap: 10px;
            background: #f5f7fa;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 12px;
        }

        .img-preview img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .img-preview span {
            font-size: 13px;
            color: #333;
            flex: 1;
        }

        .img-preview .remove {
            cursor: pointer;
            color: #aaa;
            font-size: 18px;
        }

        /* Button */
        .btn {
            padding: 9px 20px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-blue {
            background: #185FA5;
            color: white;
        }

        .btn-blue:hover {
            background: #0c447c;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            padding: 10px 12px;
            text-align: left;
            background: #f5f7fa;
            color: #666;
            font-weight: 600;
        }

        li {
            padding: 10px 12px;
            border-top: 1px solid #f0f0f0;
            color: #333;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-text {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e6f1fb;
            color: #0c447c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-edit {
            color: #185FA5;
            text-decoration: none;
            font-size: 18px;
            margin-right: 8px;
        }

        .btn-delete {
            color: #a32d2d;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- ADD FORM -->
        <div class="card">
            <h2>Add Student</h2>
            <form action="create.php" method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Student Name" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="email@example.com" required>
                    </div>
                    <div>
                        <label>Age</label>
                        <input type="number" name="age" placeholder="20" required>
                    </div>
                </div>

                <label>Photo</label>
                <div class="dropzone" onclick="document.getElementById('photoInput').click()">
                    📷 Photo choose  (JPG, PNG — max 2MB)
                </div>
                <input type="file" id="photoInput" name="photo" accept="image/*" style="display:none" onchange="previewImg(this)">

                <div class="img-preview" id="imgPreview">
                    <img id="previewImg" src="">
                    <span id="previewName"></span>
                    <span class="remove" onclick="clearImg()">✕</span>
                </div>

                <button type="submit" class="btn btn-blue">+ Add Student</button>
            </form>
        </div>

        <!-- STUDENTS liST -->
        <div class="card">
            <h2>Students list</h2>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "php_crud") or die("connection faild");
            $sql = "SELECT * FROM Students";
            $result = mysqli_query($conn, $sql) or die("query unsecces");
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table>
                    <thead>

                        <tr>
                            <th>Photo</th>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr style="border-top: 1px solid #f0f0f0;">

                                <!-- Photo -->
                                <td>
                                    <?php if ($row['Image'] != ''): ?>
                                        <img src="uploads/<?php echo $row['Image']; ?>"
                                            style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                    <?php else: ?>
                                        <div style="width:36px; height:36px; border-radius:50%; background:#e6f1fb;
                        display:flex; align-items:center; justify-content:center;
                        font-size:12px; font-weight:600; color:#0c447c;">
                                            <?php echo strtoupper(substr($row['Name'], 0, 2)); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <!-- Data -->
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Age']; ?></td>

                                <!-- Action Icons -->
                                <td style="text-align:center;">
                                    <a href="edit.php?id=<?php echo $row['S_id']; ?>"
                                        title="Edit"
                                        style="color:#185FA5; font-size:18px; margin-right:10px; text-decoration:none;">
                                        ✏️
                                    </a>

                                    <a href="delete.php?id=<?php echo $row['S_id']; ?>"
                                        title="Delete"
                                        onclick="return confirm('Are you sure delete this data ?')"
                                        style="color:#a32d2d; font-size:18px; text-decoration:none;">
                                        🗑️
                                    </a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            <?php } ?>
        </div>

    </div>

    <script>
        function previewImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('previewName').textContent = input.files[0].name;
                    document.getElementById('imgPreview').style.display = 'flex';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearImg() {
            document.getElementById('photoInput').value = '';
            document.getElementById('imgPreview').style.display = 'none';
        }
    </script>
</body>

</html>