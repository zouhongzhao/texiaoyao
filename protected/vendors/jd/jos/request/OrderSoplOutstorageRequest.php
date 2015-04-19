<?php

class OrderSoplOutstorageRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.order.sopl.outstorage';
    }

    public function setAddressId ($addressId)
    {
        $this->apiParas['address_id'] = $addressId;
        return $this;
    }

    public function setOrderId ($orderId)
    {
        $this->apiParas['order_id'] = $orderId;
        return $this;
    }

    public function setPackageNum ($packageNum)
    {
        $this->apiParas['package_num'] = $packageNum;
        return $this;
    }

    public function setSendType ($sendType)
    {
        $this->apiParas['send_type'] = $sendType;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }
}