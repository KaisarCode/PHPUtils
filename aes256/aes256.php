<?php
// AES256 + base64 encrypt
function aes256Encrypt($str, $pwd){
    $out = false;
    try {
    $pwd = sha1($pwd);
    $iv  = random_bytes(16);
    $slt = sha1(random_bytes(32));
    $pws = hash('sha256', $pwd.$slt);
    $mth = 'aes-256-cbc';
    $pwc = openssl_encrypt($str, $mth, $pws, null, $iv);
    $out = base64_encode("$iv:$slt:$pwc");
    } catch (Exception $e) {}
    return $out;
};
function aes256Decrypt($str, $pwd){
    $out = false;
    try {
    $pwd = sha1($pwd);
    $str = base64_decode($str);
    $cmp = explode(':', $str);
    $iv  = $cmp[0];
    $slt = $cmp[1];
    $txt = $cmp[2];
    $pws = hash('sha256', $pwd.$slt);
    $mth = 'aes-256-cbc';
    $pwc = openssl_decrypt($txt, $mth, $pws, null, $iv);
    $out = $pwc;
    } catch (Exception $e) {}
    return $out;
};
?>