<?php

class WarePropimgsGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.propimgs.get';
    }

    public function setWareId ($value)
    {
        $this->apiParas['ware_id'] = $value;
        return $this;
    }

    public function setAttributeValueId ($value)
    {
        $this->apiParas['attribute_value_id'] = $value;
        return $this;
    }

    public function setFields ($value)
    {
        $this->apiParas['fields'] = $value;
        return $this;
    }
}