# Basic auth
Send basic auth header

### Use
```php
include('basic-auth.php');
$usr = 'admin';
$pwd = '12345';
$msg = 'Authorization Required';
$aut = basicAuth($usr, $pwd, $msg);
if($aut) echo 'Authenticated';
```
