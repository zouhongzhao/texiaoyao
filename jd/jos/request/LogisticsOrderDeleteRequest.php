<?php

class LogisticsOrderDeleteRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.order.delete';
    }

    public function setReceiptNo($value)
    {
        return $this->apiParas['receipt_no'] = $value;
        return $this;
    }
}