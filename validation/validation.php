<?php

// ============================================
//        FORM VALIDATION - validation.php
// ============================================

$errors  = [];
$success = false;

// ---- 1. POST check ----
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ---- Data sanitize karo ----
    $fname    = trim($_POST['fname']    ?? '');
    $lname    = trim($_POST['lname']    ?? '');
    $email    = trim($_POST['email']    ?? '');
    $phone    = trim($_POST['phone']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $gender   = trim($_POST['gender']   ?? '');

    // ============================================
    //  FIRST NAME VALIDATION
    // ============================================
    if (empty($fname)) {
        $errors['fname'] = "Pehla naam required hai!";
    } elseif (strlen($fname) < 2) {
        $errors['fname'] = "Naam kam se kam 2 characters ka hona chahiye!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
        $errors['fname'] = "Naam mein sirf letters allowed hain!";
    }

    // ============================================
    //  LAST NAME VALIDATION
    // ============================================
    if (empty($lname)) {
        $errors['lname'] = "Aakhri naam required hai!";
    } elseif (strlen($lname) < 2) {
        $errors['lname'] = "Naam kam se kam 2 characters ka hona chahiye!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $lname)) {
        $errors['lname'] = "Naam mein sirf letters allowed hain!";
    }

    // ============================================
    //  EMAIL VALIDATION
    // ============================================
    if (empty($email)) {
        $errors['email'] = "Email required hai!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email address daalo! (example@gmail.com)";
    }

    // ============================================
    //  PHONE VALIDATION
    // ============================================
    if (empty($phone)) {
        $errors['phone'] = "Phone number required hai!";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors['phone'] = "Phone number 10 digits ka hona chahiye!";
    }

    // ============================================
    //  PASSWORD VALIDATION
    // ============================================
    if (empty($password)) {
        $errors['password'] = "Password required hai!";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password kam se kam 6 characters ka hona chahiye!";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors['password'] = "Password mein kam se kam ek capital letter hona chahiye!";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Password mein kam se kam ek number hona chahiye!";
    }

    // ============================================
    //  GENDER VALIDATION
    // ============================================
    $allowed_genders = ['male', 'female', 'other'];
    if (empty($gender)) {
        $errors['gender'] = "Gender select karo!";
    } elseif (!in_array($gender, $allowed_genders)) {
        $errors['gender'] = "Invalid gender selected!";
    }

    // ============================================
    //  AGAR KOI ERROR NAHI HAI
    // ============================================
    if (empty($errors)) {
        $success = true;

        // Yahan aap database insert kar sakte ho:
        /*
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        $fname    = mysqli_real_escape_string($conn, $fname);
        $lname    = mysqli_real_escape_string($conn, $lname);
        $email    = mysqli_real_escape_string($conn, $email);
        $phone    = mysqli_real_escape_string($conn, $phone);
        $password = password_hash($password, PASSWORD_DEFAULT); // secure hashing
        $gender   = mysqli_real_escape_string($conn, $gender);

        $sql = "INSERT INTO users (fname, lname, email, phone, password, gender)
                VALUES ('$fname','$lname','$email','$phone','$password','$gender')";

        if (mysqli_query($conn, $sql)) {
            $success = true;
        } else {
            $errors['db'] = "Database error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        */
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Validation Result</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: #0a0a0f;
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      font-family: 'DM Sans', sans-serif;
      padding: 2rem;
    }
    .card {
      background: #111118;
      border: 1px solid #1e1e2e;
      border-radius: 24px;
      padding: 2.5rem;
      width: 100%; max-width: 480px;
    }
    h2 { font-family: 'Syne', sans-serif; color: #e2e8f0; margin-bottom: 1.2rem; }
    .success {
      background: rgba(16,185,129,0.1);
      border: 1px solid rgba(16,185,129,0.3);
      color: #6ee7b7; border-radius: 12px;
      padding: 1rem; margin-bottom: 1rem;
    }
    .error-box {
      background: rgba(244,63,94,0.08);
      border: 1px solid rgba(244,63,94,0.3);
      border-radius: 12px; padding: 1rem; margin-bottom: 0.6rem;
    }
    .error-box strong { color: #f43f5e; font-size: 0.8rem; text-transform: uppercase; }
    .error-box p { color: #fda4af; font-size: 0.9rem; margin-top: 4px; }
    .data-row { display: flex; justify-content: space-between; padding: 0.6rem 0; border-bottom: 1px solid #1e1e2e; color: #94a3b8; font-size: 0.9rem; }
    .data-row span:last-child { color: #e2e8f0; font-weight: 500; }
    .btn { display: inline-block; margin-top: 1.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #7c3aed, #06b6d4); color: #fff; border-radius: 10px; text-decoration: none; font-family: 'Syne', sans-serif; font-weight: 600; }
  </style>
</head>
<body>
<div class="card">
  <?php if ($success): ?>
    <h2>🎉 Registration Successful!</h2>
    <div class="success">Aapka form successfully submit ho gaya!</div>
    <div class="data-row"><span>Naam</span><span><?= htmlspecialchars($fname . ' ' . $lname) ?></span></div>
    <div class="data-row"><span>Email</span><span><?= htmlspecialchars($email) ?></span></div>
    <div class="data-row"><span>Phone</span><span><?= htmlspecialchars($phone) ?></span></div>
    <div class="data-row"><span>Gender</span><span><?= htmlspecialchars(ucfirst($gender)) ?></span></div>

  <?php elseif (!empty($errors)): ?>
    <h2>❌ Errors Mile!</h2>
    <?php foreach ($errors as $field => $msg): ?>
      <div class="error-box">
        <strong><?= htmlspecialchars($field) ?></strong>
        <p><?= htmlspecialchars($msg) ?></p>
      </div>
    <?php endforeach; ?>
    <a href="form.html" class="btn">← Wapas Jao</a>

  <?php else: ?>
    <h2>⚠️ Direct Access</h2>
    <p style="color:#64748b">Pehle form.html se form fill karo.</p>
    <a href="form.html" class="btn">Form Pe Jao →</a>
  <?php endif; ?>
</div>
</body>
</html>