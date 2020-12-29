<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Dragonpay\Helper;

class DragonpayAcceptNotificationResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        $data = $this->getData();
        $digestCheck = Helper::confirmDigest(
            $data['digest'],
            $data['txnid'],
            $data['refno'],
            $data['status'],
            $data['message'],
            $this->getRequest()->getPassword(),
        );

        return $digestCheck && $data['status'] == 'S';
    }

    public function getTransactionReference()
    {
        return $this->data['refno'];
    }

    public function getMessage()
    {
        return $this->data['message'];
    }
}
