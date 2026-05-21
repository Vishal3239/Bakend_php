<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 480px;
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 22px;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: #4a90e2;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        button[type="submit"]:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registration Form</h2>

        <form action="process_post.php" method="POST">

            <div class="form-group">
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" placeholder="Apna naam likhein" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="email@example.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="umar">Umar</label>
                <input type="number" id="umar" name="umar" placeholder="25">
            </div>

            <div class="form-group">
                <label for="sandesh">Address</label>
                <textarea id="sandesh" name="sandesh" rows="3" placeholder="Write here..."></textarea>
            </div>

            <button type="submit">Submit</button>

        </form>
    </div>

</body>
</html>