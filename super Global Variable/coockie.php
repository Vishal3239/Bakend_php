<?php
setcookie("vishal", "patel", time() + (10), "/");
?>

<!doctype html>
<html lang="en">

<head>
  <style>
    .container {
      height: 200px;
      width: 500px;
      background-color: black;
      margin: auto;
      color: white;
      text-align: center;
    }

    #timer {
      font-size: 60px;
      margin: auto;
      justify-content: center;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Cookei Expire Coundown</h1>
    <p id="timer"></p>
  </div>
  <script>
    var timeLeft = 10;
    var x = setInterval(function() {
      document.getElementById("timer").innerHTML = timeLeft;
      timeLeft--;
      if (timeLeft < 0) {
        clearInterval(x);
      var ex=document.getElementById("timer").innerHTML = "Cookie expire";

      }
    },1000);
  </script>
  <?php
  if (isset($_COOKIE["vishal"])) {
    echo "my last name is " . $_COOKIE["vishal"];
  } else {
    echo "cookei not create";
  }
  ?>

</body>

</html>