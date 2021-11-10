<html>
<script src = "loginjs.js"></script>
<head>
    <title>Login</title>
    <link rel="stylesheet" type = "text/css" href="css/logincss.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 class="loginheader">Admin Login </h2>
      <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form" action = "PloginAdmin.php" method = "POST">
        <input type="text" placeholder="username" name="Ausername"/>
        <input type="password" placeholder="password" name="Apassword"/>
        <button>login</button>
        <p class="message">Please login using registered Username and Password</p>
      </form>
    </div>
  </div>
</body>
</html>
