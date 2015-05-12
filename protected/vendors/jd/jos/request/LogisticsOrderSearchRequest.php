<?php

class LogisticsOrderSearchRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.order.search';
    }

    public function setReceiptNos($value)
    {
        return $this->apiParas['receipt_nos'] = $value;
        return $this;
    }

    public function setStatus($value)
    {
        return $this->apiParas['status'] = $value;
        return $this;
    }
}