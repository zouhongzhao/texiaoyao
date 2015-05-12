<?php

class SopOrderWaybillUpdateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.order.sop.waybill.update';
    }

    public function setLogisticsId ($logisticsId)
    {
        $this->apiParas['logistics_id'] = $logisticsId;
        return $this;
    }

    public function setOrderId ($orderId)
    {
        $this->apiParas['order_id'] = $orderId;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }

    public function setWaybill ($waybill)
    {
        $this->apiParas['waybill'] = $waybill;
        return $this;
    }
}