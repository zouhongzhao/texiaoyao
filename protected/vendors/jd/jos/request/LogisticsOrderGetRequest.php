<?php

class LogisticsOrderGetRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.order.get';
    }

    public function setReceiptNo($value)
    {
        return $this->apiParas['receipt_no'] = $value;
        return $this;
    }
}