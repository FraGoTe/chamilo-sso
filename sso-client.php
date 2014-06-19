<?php

//Form sent
if (!empty($_GET)) {
    //Getting the chamilo server
    if ($_GET['sso_cookie']) {
        //Review SSO variable
        $cookieInformation = unserialize(base64_decode($_GET['sso_cookie']));
        if (validateUser($cookieInformation['username'], $cookieInformation['secret'])) {
            echo "<h1>You are IN. </h1>";
            exit;
        }
    }
}

/**
 * This function is to validate the user
 */
function validateUser($user, $pass) {
    /**
     * Here you have to validate the user
     * and password from the sso_cookie
     * to your system
     */
    return true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Example of SSO with Chamilo 1.9.8</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.1.1/united/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
</head>
  <div class="container">
    <fieldset>
        <legend>Login Form</legend>
        <form method="POST" role="form">
          <div class="form-group">
            <label for="user">User: </label>
            <input type="text" class="form-control" name="user" id="user" placeholder="User">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </fieldset>
</div>
<footer>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//platform.twitter.com/widgets.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</footer>
</html>