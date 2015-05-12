<?php

class WareSkuGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.sku.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setSkuId ($skuId)
    {
        $this->apiParas['sku_id'] = $skuId;
        return $this;
    }
}