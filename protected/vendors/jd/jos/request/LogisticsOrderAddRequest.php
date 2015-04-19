<?php

class LogisticsOrderAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.order.add';
    }

    public function setChannelsSellerNo($value)
    {
        return $this->apiParas['channels_seller_no'] = $value;
        return $this;
    }

    public function setChannelsOutboundNo($value)
    {
        return $this->apiParas['channels_outbound_no'] = $value;
        return $this;
    }

    public function setWarehouseNo($value)
    {
        return $this->apiParas['warehouse_no'] = $value;
        return $this;
    }

    public function setCarriersId($value)
    {
        return $this->apiParas['carriers_id'] = $value;
        return $this;
    }

    public function setExpectDate($value)
    {
        return $this->apiParas['expect_date'] = $value;
        return $this;
    }

    public function setOrderNo($value)
    {
        return $this->apiParas['order_no'] = $value;
        return $this;
    }

    public function setShopNo($value)
    {
        return $this->apiParas['shop_no'] = $value;
        return $this;
    }

    public function setConsigneeName($value)
    {
        return $this->apiParas['consignee_name'] = $value;
        return $this;
    }

    public function setAddressProvince($value)
    {
        return $this->apiParas['address_province'] = $value;
        return $this;
    }

    public function setAddressCity($value)
    {
        return $this->apiParas['address_city'] = $value;
        return $this;
    }

    public function setAddressCounty($value)
    {
        return $this->apiParas['address_county'] = $value;
        return $this;
    }

    public function setAddressTown($value)
    {
        return $this->apiParas['address_town'] = $value;
        return $this;
    }

    public function setAddress($value)
    {
        return $this->apiParas['address'] = $value;
        return $this;
    }

    public function setZipCode($value)
    {
        return $this->apiParas['zip_code'] = $value;
        return $this;
    }

    public function setPhone($value)
    {
        return $this->apiParas['phone'] = $value;
        return $this;
    }

    public function setMobile($value)
    {
        return $this->apiParas['mobile'] = $value;
        return $this;
    }

    public function setReceivable($value)
    {
        return $this->apiParas['receivable'] = $value;
        return $this;
    }

    public function setEmail($value)
    {
        return $this->apiParas['email'] = $value;
        return $this;
    }

    public function setBuyerRemark($value)
    {
        return $this->apiParas['buyer_remark'] = $value;
        return $this;
    }

    public function setVerifyRemark($value)
    {
        return $this->apiParas['verify_remark'] = $value;
        return $this;
    }

    public function setReturnConsigneeAddress($value)
    {
        return $this->apiParas['return_consignee_address'] = $value;
        return $this;
    }

    public function setReturnConsigneeName($value)
    {
        return $this->apiParas['return_consignee_name'] = $value;
        return $this;
    }

    public function setReturnConsigneePhone($value)
    {
        return $this->apiParas['return_consignee_phone'] = $value;
        return $this;
    }

    public function setStationNo($value)
    {
        return $this->apiParas['station_no'] = $value;
        return $this;
    }

    public function setStationName($value)
    {
        return $this->apiParas['station_name'] = $value;
        return $this;
    }

    public function setOrderMark($value)
    {
        return $this->apiParas['order_mark'] = $value;
        return $this;
    }

    public function setShopOrderSource($value)
    {
        return $this->apiParas['shop_order_source'] = $value;
        return $this;
    }

    public function setShopOrderCreateTime($value)
    {
        return $this->apiParas['shop_order_create_time'] = $value;
        return $this;
    }

    public function setPicker($value)
    {
        return $this->apiParas['picker'] = $value;
        return $this;
    }

    public function setPickerCall($value)
    {
        return $this->apiParas['picker_call'] = $value;
        return $this;
    }

    public function setPikerId($value)
    {
        return $this->apiParas['piker_id'] = $value;
        return $this;
    }

    public function setPackType($value)
    {
        return $this->apiParas['pack_type'] = $value;
        return $this;
    }

    public function setGoodsNo($value)
    {
        return $this->apiParas['goods_no'] = $value;
        return $this;
    }

    public function setSkuId($value)
    {
        return $this->apiParas['sku_id'] = $value;
        return $this;
    }

    public function setShopGoodsNo($value)
    {
        return $this->apiParas['shopGoodsNo'] = $value;
        return $this;
    }

    public function setQty($value)
    {
        return $this->apiParas['qty'] = $value;
        return $this;
    }

    public function setGoodsStatus($value)
    {
        return $this->apiParas['goods_status'] = $value;
        return $this;
    }
}