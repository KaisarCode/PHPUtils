# AES256
AES256 Encrypt/decrypt

### Use
```php
include('aes256.php');

$str = "My secret message";
$key = "My Secret key";

$crp = aes256Encrypt($str, $key);
$dcr = aes256Decrypt($crp, $key);

echo "Encrypted: $crp";
echo "<br />";
echo "<br />";
echo "Decrypted: $dcr"
```
