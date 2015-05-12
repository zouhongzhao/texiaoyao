<?php

class WareDeleteRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.delete';
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }

    public function setWareId ($wareId)
    {
        $this->apiParas['ware_id'] = $wareId;
        return $this;
    }
}