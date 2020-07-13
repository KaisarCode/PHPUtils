<?php
// Several URL processing functions

function getURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) { $pageURL .= "s"; }
    $pageURL .= "://";
    $server_name = $_SERVER["SERVER_NAME"];
    if (!$server_name) $server_name = $_SERVER['REMOTE_ADDR'];
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $server_name.":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $server_name.$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function getURLPath($url = null, $root_path = '/') {
    if (!$url) $url = getURL();
    $url_parsed = parse_url($url);
    $url_path = $url_parsed["path"];
    $url_path_last_char = substr($url_path, -1);
    if ($url_path_last_char == "/") {
        $url_path = substr($url_path, 0, -1);
    }
    $url_path = trim($url_path);
    if ($root_path) {
        if(strpos($url_path, $root_path) === 0) $url_path = '/'.ltrim($url_path, $root_path);
    }
    if ($url_path == '') $url_path = $root_path;
    $url_path = explode('/', $url_path);
    $url_path = array_filter($url_path);
    $url_path = array_values($url_path);
    return $url_path;
}

function getPageID($url = null, $glue = '-') {
    if(!$url) $url = getURL();
    $url_path = getURLPath($url);
    $url_path = implode($glue, $url_path);
    if($url_path == '') $url_path = 'root';
    return $url_path;
}

function pathMatch($rx = '.*', $path = '') {
    $out = false;
    if (!$path) {
        $path = '/'.implode('/', getURLPath());
    }
    $rx = str_replace('/', '\/', $rx);
    if (preg_match('/^'.$rx.'$/', $path)) {
        $out = true;
    }
    return $out;
}
?>