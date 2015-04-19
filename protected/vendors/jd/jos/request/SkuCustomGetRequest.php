<?php

class SkuCustomGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.sku.custom.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setOuterId ($outerId)
    {
        $this->apiParas['outer_id'] = $outerId;
        return $this;
    }
}