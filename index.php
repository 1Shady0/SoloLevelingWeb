<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <title>Solo Leveling Web</title>

</head>
<body>
<div class="container">

    <div class="tab" id="signup">
        <h3 align="center">Sign up</h3>
        <form action="signup.php" method="post">
            <input type="text" name="su_username" placeholder="Username"><br>
            <input type="password" name="su_pass" placeholder="Password"><br>
            <input type="password" name="su_pass_confirm" placeholder="Confirm Password"><br>
            <button class="btn" type="submit">SIGN UP</button><br>
            <div>You already have an account ? <button type="button" onclick="swap_form1()">Login</button></div>
        </form>
    </div>
    <div class="tab" id="login">
  <div align="center">  <?php
if (isset($_GET['msg'])){echo $_GET['msg'];} 
?></div>
        <h3 align="center">Login</h3>
            <form action="login.php" method="post">
                <input type="text" name="li_username" placeholder="Username"><br>
                <input type="password" name="li_pass" placeholder="Password"><br>
                <button class="btn" type="submit">LOGIN</button><br>
                <div>You don't have an account ? <button type="button" onclick="swap_form2()">Sign up</button></div>
            </form>
    </div>
</div>   
</body>
</html>