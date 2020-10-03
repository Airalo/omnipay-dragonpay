<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class DragonpayAuthorizeResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $liveCheckoutEndpoint = 'https://gw.dragonpay.ph/Pay.aspx';
    protected $testCheckoutEndpoint = 'https://test.dragonpay.ph/Pay.aspx';

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->data;
    }

    protected function getCheckoutEndpoint()
    {
        return $this->getRequest()->getTestMode() ? $this->testCheckoutEndpoint : $this->liveCheckoutEndpoint;
    }

    public function getRedirectUrl()
    {
        return $this->getCheckoutEndpoint() . '?' .http_build_query($this->getRedirectData(), '', '&');
    }
}