<?php

class EtmsWaybillSendRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.etms.waybill.send';
    }

    public function setDeliveryId($value)
    {
        return $this->apiParas['deliveryId'] = $value;
        return $this;
    }

    public function setSalePlat($value)
    {
        return $this->apiParas['salePlat'] = $value;
        return $this;
    }

    public function setCustomerCode($value)
    {
        return $this->apiParas['customerCode'] = $value;
        return $this;
    }

    public function setOrderId($value)
    {
        return $this->apiParas['orderId'] = $value;
        return $this;
    }

    public function setThrOrderId($value)
    {
        return $this->apiParas['thrOrderId'] = $value;
        return $this;
    }

    public function setSelfPrintWayBill($value)
    {
        return $this->apiParas['selfPrintWayBill'] = $value;
        return $this;
    }

    public function setPickMethod($value)
    {
        return $this->apiParas['pickMethod'] = $value;
        return $this;
    }

    public function setPackageRequired($value)
    {
        return $this->apiParas['packageRequired'] = $value;
        return $this;
    }

    public function setSenderName($value)
    {
        return $this->apiParas['senderName'] = $value;
        return $this;
    }

    public function setSenderAddress($value)
    {
        return $this->apiParas['senderAddress'] = $value;
        return $this;
    }

    public function setSenderTel($value)
    {
        return $this->apiParas['senderTel'] = $value;
        return $this;
    }

    public function setSenderMobile($value)
    {
        return $this->apiParas['senderMobile'] = $value;
        return $this;
    }

    public function setSenderPostcode($value)
    {
        return $this->apiParas['senderPostcode'] = $value;
        return $this;
    }

    public function setReceiveName($value)
    {
        return $this->apiParas['receiveName'] = $value;
        return $this;
    }

    public function setReceiveAddress($value)
    {
        return $this->apiParas['receiveAddress'] = $value;
        return $this;
    }

    public function setProvince($value)
    {
        return $this->apiParas['province'] = $value;
        return $this;
    }

    public function setCity($value)
    {
        return $this->apiParas['city'] = $value;
        return $this;
    }

    public function setCounty($value)
    {
        return $this->apiParas['county'] = $value;
        return $this;
    }

    public function setTown($value)
    {
        return $this->apiParas['town'] = $value;
        return $this;
    }

    public function setReceiveTel($value)
    {
        return $this->apiParas['receiveTel'] = $value;
        return $this;
    }

    public function setReceiveMobile($value)
    {
        return $this->apiParas['receiveMobile'] = $value;
        return $this;
    }

    public function setPostcode($value)
    {
        return $this->apiParas['postcode'] = $value;
        return $this;
    }

    public function setPackageCount($value)
    {
        return $this->apiParas['packageCount'] = $value;
        return $this;
    }

    public function setWeight($value)
    {
        return $this->apiParas['weight'] = $value;
        return $this;
    }

    public function setVloumLong($value)
    {
        return $this->apiParas['vloumLong'] = $value;
        return $this;
    }

    public function setVloumWidth($value)
    {
        return $this->apiParas['vloumWidth'] = $value;
        return $this;
    }

    public function setVloumHeight($value)
    {
        return $this->apiParas['vloumHeight'] = $value;
        return $this;
    }

    public function setVloumn($value)
    {
        return $this->apiParas['vloumn'] = $value;
        return $this;
    }

    public function setDescription($value)
    {
        return $this->apiParas['description'] = $value;
        return $this;
    }

    public function setCollectionValue($value)
    {
        return $this->apiParas['collectionValue'] = $value;
        return $this;
    }

    public function setCollectionMoney($value)
    {
        return $this->apiParas['collectionMoney'] = $value;
        return $this;
    }

    public function setGuaranteeValue($value)
    {
        return $this->apiParas['guaranteeValue'] = $value;
        return $this;
    }

    public function setGuaranteeValueAmount($value)
    {
        return $this->apiParas['guaranteeValueAmount'] = $value;
        return $this;
    }

    public function setSignReturn($value)
    {
        return $this->apiParas['signReturn'] = $value;
        return $this;
    }

    public function setAging($value)
    {
        return $this->apiParas['aging'] = $value;
        return $this;
    }

    public function setTransType($value)
    {
        return $this->apiParas['transType'] = $value;
        return $this;
    }
}