<?php

class WareSkuDeleteRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.sku.delete';
    }

    public function setSkuId ($skuId)
    {
        $this->apiParas['sku_id'] = $skuId;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }
}