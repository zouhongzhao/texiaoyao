<?php

class WareListRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.wares.list.get';
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