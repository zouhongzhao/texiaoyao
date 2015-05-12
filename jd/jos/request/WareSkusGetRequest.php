<?php

class WareSkusGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.skus.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setWareIds ($wareIds)
    {
        $this->apiParas['ware_ids'] = $wareIds;
        return $this;
    }
}