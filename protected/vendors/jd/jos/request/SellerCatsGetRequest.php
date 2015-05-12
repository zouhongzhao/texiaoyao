<?php

class SellerCatsGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.sellercats.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }
}