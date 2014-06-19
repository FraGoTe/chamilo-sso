<?php

//Form sent
if (!empty($_POST)) {
    //Getting the chamilo server
    $myChamiloServer = 'chamilo19x';
    $myOtherSystem = 'localhost/chamilo-sso/index.php';
    $account = array();
    if (validateUser($_POST['user'], $_POST['password'])) {
        //validate if the user is already logged 
        //in my external system in order to redirect to chamilo    
        $account['username'] = $_POST['user']; //username in Chamilo
        $account['password'] = sha1(sha1($_POST['password'])); //encrypted password with assuming that the first encrypted method is sha1 in chamilo
        
        $masterAuthUri = $myChamiloServer;
        // Creating an array cookie that will be sent to Chamilo
        $sso = array(
            'username' => $account['username'],
            'secret' => $account['password'],
            'master_domain' => $myChamiloServer,
            'master_auth_uri' => $masterAuthUri,
            'lifetime' => time() + 3600,
            'target' => filterXss($_GET['sso_target']),
        );
        $cookie = base64_encode(serialize($sso));
        $chamiloUrl = chamiloSsoProtocol() . $masterAuthUri;
        $otherUrl = 'http://' . $myOtherSystem;
        $params = 'loginFailed=0&sso_referer=' . $otherUrl . '&sso_cookie=' . urlencode($cookie);
        $finalUrl = $chamiloUrl .'?'. $params;
        header('Location: ' . $finalUrl);
        exit;
    }
}

/**
 * Validate the authentication
 */
function validateUser($user, $pass) 
{
    return true;
}

/**
 * This function is to avoid XSS
 */
function filterXss($val) 
{
    return $val;
}
/**
 * This is to get the chamilo protocol
 */
function chamiloSsoProtocol() 
{
    return 'http://';
}
/**
 * This is to get my other System protocol
 */
function mySystemProtocol() 
{
    return 'http://';
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