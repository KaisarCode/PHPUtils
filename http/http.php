<?php
// Several HTTP-related functions
// Sessions, cookies, body and querystring

function httpMethod() {
    return $_SERVER['REQUEST_METHOD'];
}

function getBrowserLang($dft = 'en') {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } else {
        return $dft;
    }
}

function getHTTPBody() {
    return file_get_contents("php://input");
}

function getHTTPVars() {
    $out = array();
    foreach ($_POST as $k => $v) {
        array_push($out, $k);
    }
    foreach ($_GET as $k => $v) {
        array_push($out, $k);
    }
    return $out;
}

function getSessionVars() {
    $out = array();
    foreach ($_SESSION as $k => $v) {
        array_push($out, $k);
    }
    return $out;
}

function getCookieVars() {
    $out = array();
    foreach ($_COOKIE as $k => $v) {
        array_push($out, $k);
    }
    return $out;
}

function getHTTPVar($key, $replace = '') {
    $out = '';
    if (isset($_POST[$key])) {
        $out = $_POST[$key];
        if ($replace) {
            $replace = str_split($replace);
            $out  = str_replace($replace, '', $out);
        }
    }
    if (isset($_GET[$key])) {
        $out = $_GET[$key];
        if ($replace) {
            $replace = str_split($replace);
            $out  = str_replace($replace, '', $out);
        }
    }
    return $out;
}

function getSessionVar($key, $replace = '') {
    $out = '';
    if (isset($_SESSION[$key])) {
        $out = $_SESSION[$key];
        if ($replace) {
            $replace = str_split($replace);
            $out  = str_replace($replace, '', $out);
        }
    }
    return $out;
}

function getCookieVar($key, $replace = '') {
    $out = '';
    if (isset($_COOKIE[$key])) {
        $out = $_COOKIE[$key];
        if ($replace) {
            $replace = str_split($replace);
            $out  = str_replace($replace, '', $out);
        }
    }
    return $out;
}
?>