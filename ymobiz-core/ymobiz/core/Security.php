<?php

namespace ymobiz\core;

use Yii;

class Security extends \yii\base\Security
{
    // AES has 128-bit block size and three key sizes: 128, 192 and 256 bits.
    // mcrypt offers the Rijndael cipher with block sizes of 128, 192 and 256
    // bits but only the 128-bit Rijndael is standardized in AES.
    // So to use AES in mycrypt, specify `'rijndael-128'` cipher and mcrypt
    // chooses the appropriate AES based on the length of the supplied key.
    const MCRYPT_CIPHER = 'rijndael-128';
    const MCRYPT_MODE = 'cbc';
    // Same size for encryption keys, auth keys and KDF salt
    const KEY_SIZE = 32;
    // Hash algorithm for key derivation.
    const KDF_HASH = 'sha256';
    // Hash algorithm for authentication.
    const MAC_HASH = 'sha256';
    // HKDF info value for auth keys
    const AUTH_KEY_INFO = 'AuthorizationKey';
}