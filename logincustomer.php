<html>
<script src = "loginjs.js"></script>
<head>
    <title>Login</title>
    <link rel="stylesheet" type = "text/css" href="css/logincss.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 class="loginheader">Customer Login </h2>
      <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form" action = "Plogincustomer.php" method = "POST">
        <input type="text" placeholder="username" name="Cusername"/>
        <input type="password" placeholder="password" name="Cpassword"/>
        <button>login</button>
        <p class="message">Not registered? <a href="registercustomer.php">Create an account</a></p>
       <p class = "message">If admin click here <a href = "loginadmin.php">Admin login page</a></p>
      </form>
    </div>
  </div>
</body>
</html>
