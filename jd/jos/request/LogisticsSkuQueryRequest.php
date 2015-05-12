<?php

class LogisticsSkuQueryRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.sku.query';
    }

    public function setJoslGoodNo($value)
    {
        return $this->apiParas['josl_good_no'] = $value;
        return $this;
    }

    public function setIsvGoodNo($value)
    {
        return $this->apiParas['isv_good_no'] = $value;
        return $this;
    }
}