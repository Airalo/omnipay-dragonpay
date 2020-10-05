<?php

namespace Omnipay\Dragonpay;

class Helper
{
    public static function generateHash($merchantId, $txnId, $amount, $currency, $description, $email, $secretKey)
    {
        $parts = array(
            $merchantId,
            $txnId,
            number_format($amount, 2, '.', ''),
            $currency,
            $description ?? '',
            $email ?? '',
            $secretKey
        );

        $buffer = implode(':', $parts);

        return sha1($buffer);
    }

    public static function confirmDigest($digest, $txnId, $refno, $status, $message, $secretKey)
    {
        $parts = array(
            $txnId,
            $refno,
            $status,
            $message,
            $secretKey
        );

        $internalDigest = sha1(implode(':', $parts));

        return $internalDigest === $digest;
    }
}