<?php

class OrderPrintRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.order.print';
    }

    public function setOptionalFields ($optionalFields)
    {
        $this->apiParas['optional_fields'] = $optionalFields;
        return $this;
    }

    public function setOrderId ($orderId)
    {
        $this->apiParas['order_id'] = $orderId;
        return $this;
    }
}