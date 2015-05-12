<?php

class SopOrderPrintDataGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.order.sop.print.data.get';
    }

    public function setOrderId ($orderId)
    {
        $this->apiParas['order_id'] = $orderId;
        return $this;
    }
}