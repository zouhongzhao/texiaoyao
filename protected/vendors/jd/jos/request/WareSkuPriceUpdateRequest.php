<?php

class WareSkuPriceUpdateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.sku.price.update';
    }

    public function setOuterId ($outerId)
    {
        $this->apiParas['outer_id'] = $outerId;
        return $this;
    }

    public function setPrice ($price)
    {
        $this->apiParas['price'] = $price;
        return $this;
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