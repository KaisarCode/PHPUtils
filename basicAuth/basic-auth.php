<?php
// Send basic auth header
function basicAuth($usr = '', $pwd = '', $msg = 'Authorization Required') {
    $has_cred = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    $not_auth = (
        !$has_cred ||
        $_SERVER['PHP_AUTH_USER'] != $usr ||
        $_SERVER['PHP_AUTH_PW']   != $pwd
    );
    if ($not_auth) {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="'.$msg.'"');
        return false;
    } else {
        return true;
    }
}
?>