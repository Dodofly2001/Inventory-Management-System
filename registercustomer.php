<html>
<script src = "loginjs.js"></script>
<head>
    <title>Login</title>
    <link rel="stylesheet" type = "text/css" href="css/registercss.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 class="loginheader">Customer Register </h2>
      <!--
      <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      -->
      <form class="login-form" action = "Pregister.php" method = "POST">
        <input type="text" placeholder="username (e.g username1)" name="Cusername"/>
        <input type="password" placeholder="password" name="Cpassword"/>
        <input type= "text" placeholder = "email (e.g user1@gmail.com)" name = "Cemail"/>
        <input type = "text" placeholder = "fullname (e.g John Doe)" name = "Cname"/>
        <input type = "text" placeholder = "phone number (e.g 012345678901)" name = "Cphonenum"/>
        <input type = "text" placeholder = "address number (e.g 6th NO 9)" name = "Caddressnum"/>
        <input type = "text" placeholder = "address street (e.g Street Avenue)" name = "Caddressstreet"/>
        <select name="Cstate" id="Cstate" >
            <option value="Johor">Johor</option>
            <option value = "Kedah">Kedah</option>
            <option value = "Kelantan">Kelantan</option>
            <option value = "Melaka">Melaka</option>
            <option value = "Negeri Sembilan">Negeri Sembilan</option>
            <option value = "Pahang">Pahang</option>
            <option value = "Pulau Pinang">Pulau Pinang</option>
            <option value = "Perak">Perak</option>
            <option value = "Perlis">Perlis</option>
            <option value = "Sabah">Sabah</option>
            <option value = "Sarawak">Sarawak</option>
            <option value = "Selangor">Selangor</option>
            <option value = "Terengganu">Terengganu</option>
            <option value = "Kuala Lumpur">Kuala Lumpur</option>
            <option value = "Labuan">Labuan</option>
            <option value = "Putrajaya"></option>        
        </select>
        <input type = "text" placeholder = "postcode (e.g 33400)" name="Caddresspostcode">
        <input type = "text" placeholder = "town (e.g Setapak)" name = "Caddresstown">
        <button>REGISTER</button>
        <p class="message">Already register <a href="logincustomer.php">Login now</a></p>
       <p class = "message">If admin click here <a href = "loginadmin.php">Admin login page</a></p>
      </form>
    </div>
  </div>
</body>
</html>
