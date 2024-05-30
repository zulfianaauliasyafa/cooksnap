<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register New Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    #box {
      border: 5px solid transparent;
      padding: 30px;
      width: 450px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      background-color: rgba(0, 0, 0, 0.5);
    }
    h1 {
      z-index: 1;
      position: relative;
      top: 10;
      height: 145px;
      color: rgb(255, 230, 0);
      margin-right: 15px;
      font-size: 90px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    body {
      font-family:sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-image: url('https://c1.wallpaperflare.com/path/461/820/840/resep-low-electric-bass-strings-475702149f76526165d83089b5aa5c3b.jpg');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: white;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #999;
    }
    .regisbutton {
      font-family: sans-serif;
      background-color: rgb(255, 223, 95);
      color: inherit;
      border: 2px solid rgb(255, 223, 95);
      padding: 7px 17px; 
      font-size: 18px; 
      margin-top: 10px;
      cursor: pointer; 
      border-radius: 5px; 
    }
    #boxlogin {
      margin-top: 10px;
      font-family: sans-serif;
      color: rgb(255, 255, 255);
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-actions {
      text-align: center;
    }
    a {
            color: rgb(255, 223, 95);
            text-decoration: none;
        }
  </style>
</head>
<body>
  <h1>ResepMe</h1>
  <div id="box">
    <form action="{{ route('register.action') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" id="name" name="name" required>
        @if ($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
      </div>
      <div class="form-group">
        <label for="username">Username <span class="text-danger">*</span></label>
        <input type="text" id="username" name="username" required>
        @if ($errors->has('username'))
        <div class="text-danger">
            {{ $errors->first('username') }}
        </div>
    @endif
      </div>
      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" id="password" name="password" required>
        @if ($errors->has('password'))
        <div class="text-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
      </div>
      <div class="form-group">
        <label for="password_confirm">Password Confirmation <span class="text-danger">*</span></label>
        <input type="password" id="password_confirm" name="password_confirm" required>
        @if ($errors->has('password_confirm'))
        <div class="text-danger">
            {{ $errors->first('password_confirm') }}
        </div>
    @endif
      </div>
      <div class="form-actions">
        <input type="submit" value="Register" class="regisbutton">
      </div>
    </form>
    <div id="boxlogin">
      <p>Already have an account? <a href="{{('/')}}">Login here</a></p>
    </div>
  </div>
</body>
</html>
