<html>
<script src = "loginjs.js"></script>
<head>
    <title>Login</title>
    <link rel="stylesheet" type = "text/css" href="css/registercss.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 class="loginheader">Customer Update Detail</h2>
      <!--
      <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      -->
      <form class="login-form" action = "Pupdatecustomer.php" method = "POST">

        <input type="text" placeholder="username" name="Cusername"/>
        <input type="password" placeholder="password" name="Cpassword"/>
        <input type= "text" placeholder = "email" name = "Cemail"/>
        <input type = "text" placeholder = "fullname" name = "Cname"/>
        <input type = "text" placeholder = "phone number" name = "Cphonenum"/>
        <input type = "text" placeholder = "address number" name = "Caddressnum"/>
        <input type = "text" placeholder = "address street" name = "Caddressstreet"/>
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
        <input type = "text" placeholder = "postcode" name="Caddresspostcode">
        <input type = "text" placeholder = "town" name = "Caddresstown">
        <button>UPDATE</button>
      </form>
    </div>
  </div>
</body>
</html>
