<?php

namespace Omnipay\Dragonpay\Message;

class DragonpayCompletePurchaseRequest extends DragonpayAbstractRequest
{
    public function getData()
    {
        $data = array(
            'txnid'   => $this->getTxnid(),
            'refno'   => $this->getRefno(),
            'status'  => $this->getStatus(),
            'message' => $this->getMessage(),
            'digest'  => $this->getDigest(),
        );

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new DragonpayCompletePurchaseResponse($this, $data);
    }

    public function getTxnid()
    {
        return $this->getParameter('txnid');
    }

    public function setTxnid($value)
    {
        return $this->setParameter('txnid', $value);
    }

    public function getRefno()
    {
        return $this->getParameter('refno');
    }

    public function setRefno($value)
    {
        return $this->setParameter('refno', $value);
    }

    public function setStatus($value)
    {
        return $this->setParameter('status', $value);
    }

    public function getStatus()
    {
        return $this->getParameter('status');
    }

    public function setMessage($value)
    {
        return $this->setParameter('message', $value);
    }

    public function getMessage()
    {
        return $this->getParameter('message');
    }

    public function setDigest($value)
    {
        return $this->setParameter('digest', $value);
    }

    public function getDigest()
    {
        return $this->getParameter('digest');
    }
}
