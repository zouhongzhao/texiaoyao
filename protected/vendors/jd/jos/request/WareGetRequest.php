<?php

class WareGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setWareId ($wareId)
    {
        $this->apiParas['ware_id'] = $wareId;
        return $this;
    }
}