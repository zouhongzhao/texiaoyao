<?php

class WareUpdateListingRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.update.listing';
    }

    public function setWareIds ($wareId)
    {
        $this->apiParas['ware_id'] = $wareId;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }
}