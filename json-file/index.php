<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: #f4f5f7;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .wrap { width: 100%; max-width: 520px; }

    .card {
      background: #ffffff;
      border: 1px solid #e2e4e9;
      border-radius: 14px;
      padding: 2rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    }

    .header {
      margin-bottom: 2rem;
      padding-bottom: 1.25rem;
      border-bottom: 1px solid #e2e4e9;
    }

    .header h1 {
      font-size: 20px;
      font-weight: 600;
      color: #111827;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .header p { font-size: 13px; color: #6b7280; margin-top: 6px; }

    .badge {
      background: #E6F1FB;
      color: #0C447C;
      font-size: 11px;
      font-weight: 500;
      padding: 3px 9px;
      border-radius: 20px;
    }

    .field { margin-bottom: 1.25rem; }

    .field label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: #374151;
      margin-bottom: 6px;
    }

    .field input,
    .field select {
      width: 100%;
      height: 42px;
      padding: 0 12px;
      font-size: 14px;
      background: #f9fafb;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      color: #111827;
      outline: none;
      transition: border-color 0.15s, box-shadow 0.15s;
    }

    .field input:focus,
    .field select:focus {
      border-color: #378ADD;
      box-shadow: 0 0 0 3px rgba(55,138,221,0.12);
      background: #fff;
    }

    .field input::placeholder { color: #9ca3af; }

    .row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

    .age-hint { font-size: 11px; color: #9ca3af; margin-top: 4px; }

    .err {
      font-size: 11px;
      color: #A32D2D;
      margin-top: 4px;
      display: none;
    }

    .submit-btn {
      width: 100%;
      height: 44px;
      margin-top: 0.5rem;
      background: #185FA5;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background 0.15s, transform 0.1s;
    }

    .submit-btn:hover { background: #0C447C; }
    .submit-btn:active { transform: scale(0.99); }

    .reset-btn {
      width: 100%;
      height: 38px;
      margin-top: 8px;
      background: transparent;
      color: #6b7280;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 13px;
      cursor: pointer;
      transition: background 0.15s;
    }

    .reset-btn:hover { background: #f3f4f6; }
  </style>
</head>
<body>

<div class="wrap">
  <div class="card">
    <div class="header">
      <h1>
        <i class="ti ti-school" style="font-size:22px;color:#185FA5"></i>
        Student Registration
        <span class="badge">New Entry</span>
      </h1>
      <p>Fill in the details below to register a new student record.</p>
    </div>

    <form action="save-form.php" method="POST" onsubmit="return validate()">

      <div class="row">
        <div class="field">
          <label for="sid">
            <i class="ti ti-id-badge" style="font-size:14px;vertical-align:-2px;margin-right:4px"></i>
            Student ID
          </label>
          <input type="text" id="sid" name="id" placeholder="e.g. STU-001" maxlength="20" autocomplete="off">
          <div class="err" id="err-sid">ID is required</div>
        </div>

        <div class="field">
          <label for="age">
            <i class="ti ti-calendar-stats" style="font-size:14px;vertical-align:-2px;margin-right:4px"></i>
            Age
          </label>
          <input type="number" id="age" name="age" placeholder="e.g. 18" min="5" max="100">
          <div class="age-hint">Between 5 – 100</div>
          <div class="err" id="err-age">Enter a valid age (5–100)</div>
        </div>
      </div>

      <div class="field">
        <label for="sname">
          <i class="ti ti-user" style="font-size:14px;vertical-align:-2px;margin-right:4px"></i>
          Student Name
        </label>
        <input type="text" id="sname" name="student_name" placeholder="Full name" maxlength="60" autocomplete="off">
        <div class="err" id="err-sname">Name is required</div>
      </div>

      <div class="field">
        <label for="city">
          <i class="ti ti-map-pin" style="font-size:14px;vertical-align:-2px;margin-right:4px"></i>
          City
        </label>
        <select id="city" name="city">
          <option value="">— Select city —</option>
          <option>Varanasi</option>
          <option>Delhi</option>
          <option>Mumbai</option>
          <option>Kolkata</option>
          <option>Chennai</option>
          <option>Bengaluru</option>
          <option>Hyderabad</option>
          <option>Pune</option>
          <option>Jaipur</option>
          <option>Lucknow</option>
          <option>Agra</option>
          <option>Allahabad</option>
          <option>Kanpur</option>
          <option>Patna</option>
          <option>Bhopal</option>
          <option>Other</option>
        </select>
        <div class="err" id="err-city">Please select a city</div>
      </div>

      <button type="submit" class="submit-btn">
        <i class="ti ti-circle-check" style="font-size:18px"></i>
        Register Student
      </button>
      <button type="reset" class="reset-btn">Clear form</button>

    </form>
  </div>
</div>

<script>
  function validate() {
    let ok = true;
    const fields = [
      { id: 'sid',   err: 'err-sid',   check: v => v.trim().length > 0 },
      { id: 'sname', err: 'err-sname', check: v => v.trim().length > 0 },
      { id: 'age',   err: 'err-age',   check: v => { const n = parseInt(v); return !isNaN(n) && n >= 5 && n <= 100; } },
      { id: 'city',  err: 'err-city',  check: v => v !== '' }
    ];
    fields.forEach(f => {
      const el = document.getElementById(f.id);
      const errEl = document.getElementById(f.err);
      if (!f.check(el.value)) {
        errEl.style.display = 'block';
        el.style.borderColor = '#A32D2D';
        ok = false;
      } else {
        errEl.style.display = 'none';
        el.style.borderColor = '';
      }
    });
    return ok;
  }
</script>

</body>
</html>