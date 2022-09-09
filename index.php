<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: url(Images/bg.jpg) #FFFFFF;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 35%;
      border-radius : 5%;
      /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    h2 {
      position: fixed;
      left: 38%;
      margin: 10% auto 55% auto;
      background: #00cfff;
      display: inline-block;
      color: #ffffff;
      padding: 5%;
      border-radius: 4%;
      font-size: xx-large;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <header style="font-family: Helvetica,sans-serif;
    font-style: bold;
    display: block;
    background: #c9e1ef;
    padding: 3%;">
    <i class="fas fa-store-alt" style="display: inline;
color: #2ad83d;
font-size: xx-large;"></i>
        <button onclick="document.getElementById('id01').style.display='inline-block'" style="background: #0c5783; display: inline-block;width:auto; position:fixed; left: 0%; margin: 0% auto auto 86%; border: 4px #f7f7f7 solid;
border-radius: 16px;
color: #fff;">Login</button>
        <button onclick="document.getElementById('id03').style.display='inline-block'" style="background: #0c5783; display: inline-block;width:auto; position:relative; left:0%; margin: 0% auto auto 76%; border: 4px #f7f7f7 solid;
border-radius: 16px;
color: #fff;">Sign Up</button>
 
    </header>


  <h2 style="text-align: center">Welcome to Store <br> Manager Login</h2>

  <!-- <button onclick="document.getElementById('id01').style.display='inline-block'" style="display: inline-block;width:auto; position:fixed; left: 23%; margin: 20% auto auto 22%">Login</button>
  <button onclick="document.getElementById('id03').style.display='inline-block'" style="display: inline-block;width:auto; position:fixed; left:25%; margin: 25% auto auto 20%">Sign Up</button> -->


  <div id="id01" class="modal">

    <form class="modal-content animate" action="Backend/action_page.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
      </div>

      <div class="container">
        <label for="uname"><b style="font-family: 'Century Gothic'">Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b style="font-family: 'Century Gothic'">Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" id="id02" style="font-family: 'Century Gothic'">Login</button>
    
        <label>
          <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1; style="font-family: 'Century Gothic';">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
      </div>
    </form>
  </div>

  <div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="Backend/new_user_login.php" method="POST">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="new_email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="new_email" required>

      <label for="new_psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="new_psw" required>

      <label for="new_psw_repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="new_psw_repeat" required>
      
      <label>
        <!-- <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me -->
      </label>

      <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>



</body>

</html>


