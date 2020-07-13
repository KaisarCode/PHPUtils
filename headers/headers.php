<?php
// Several header setters

function cleanBrowserCache() {
    @header('Pragma: no-cache');
    @header('Cache: no-cache');
    @header('Cache-Control: no-cache, must-revalidate');
    @header('Expires: Mon, 01 Jan 1970 00:00:00 GMT');
}

function allowOrigin($origin = '*') {
    @header("Access-Control-Allow-Origin: $origin");
}

function setHeaderJson($charset = 'utf-8') {
    @header("Content-Type: application/json; charset=$charset");
}

function setHeaderHtml($charset = 'utf-8') {
    @header("Content-Type: text/html; charset=$charset");
}

function setHeaderText($charset = 'utf-8') {
    @header("Content-Type: text/plain; charset=$charset");
}

function set404() {
    @header('HTTP/1.1 404 Not Found', true, 404);
}

function set403() {
    @header('HTTP/1.1 403 Forbidden', true, 403);
}

function set401() {
    @header('HTTP/1.1 401 Unauthorized', true, 401);
}

function set400() {
    @header('HTTP/1.1 400 Bad Request', true, 400);
}

function set200() {
    @header('HTTP/1.1 200 OK', true, 200);
}

function noRobots() {
    @header('X-Robots-Tag: noindex, nofollow');
}
?>