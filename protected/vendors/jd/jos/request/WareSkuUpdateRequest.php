<?php

class WareSkuUpdateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return "360buy.ware.sku.update";
    }

    public function setAttributes ($attributes)
    {
        $this->apiParas['attributes'] = $attributes;
        return $this;
    }

    public function setJdPrice ($jdPrice)
    {
        $this->apiParas['jd_price'] = $jdPrice;
        return $this;
    }

    public function setOuterId ($outerId)
    {
        $this->apiParas['outer_id'] = $outerId;
        return $this;
    }

    public function setSkuId ($skuId)
    {
        $this->apiParas['sku_id'] = $skuId;
        return $this;
    }

    public function setStockNum ($stockNum)
    {
        $this->apiParas['stock_num'] = $stockNum;
        return $this;
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