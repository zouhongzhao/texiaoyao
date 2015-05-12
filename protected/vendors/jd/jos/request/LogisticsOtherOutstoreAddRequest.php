<?php

class LogisticsOtherOutstoreAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.otherOutstore.add';
    }

    public function setOutboundNo($value)
    {
        return $this->apiParas['outbound_no'] = $value;
        return $this;
    }

    public function setJoslWareNo($value)
    {
        return $this->apiParas['josl_ware_no'] = $value;
        return $this;
    }

    public function setJoslCarriersNo($value)
    {
        return $this->apiParas['josl_carriers_no'] = $value;
        return $this;
    }

    public function setExpectDate($value)
    {
        return $this->apiParas['expect_date'] = $value;
        return $this;
    }

    public function setSupplierName($value)
    {
        return $this->apiParas['supplier_name'] = $value;
        return $this;
    }

    public function setSupplierNo($value)
    {
        return $this->apiParas['supplier_no'] = $value;
        return $this;
    }

    public function setApprover($value)
    {
        return $this->apiParas['approver'] = $value;
        return $this;
    }

    public function setOutboundType($value)
    {
        return $this->apiParas['outbound_type'] = $value;
        return $this;
    }

    public function setRemark($value)
    {
        return $this->apiParas['remark'] = $value;
        return $this;
    }

    public function setConsigneeName($value)
    {
        return $this->apiParas['consignee_name'] = $value;
        return $this;
    }

    public function setAddress($value)
    {
        return $this->apiParas['address'] = $value;
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

    public function setReceivable($value)
    {
        return $this->apiParas['receivable'] = $value;
        return $this;
    }

    public function setZipCode($value)
    {
        return $this->apiParas['zip_code'] = $value;
        return $this;
    }

    public function setphone($value)
    {
        return $this->apiParas['phone'] = $value;
        return $this;
    }

    public function setMobile($value)
    {
        return $this->apiParas['mobile'] = $value;
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

    public function setReturnConsigneeName($value)
    {
        return $this->apiParas['return_consignee_name'] = $value;
        return $this;
    }

    public function setReturnConsigneeAddress($value)
    {
        return $this->apiParas['return_consignee_address'] = $value;
        return $this;
    }

    public function setReturnConsigneeMobile($value)
    {
        return $this->apiParas['return_consignee_mobile'] = $value;
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

    public function setPicker($value)
    {
        return $this->apiParas['picker'] = $value;
        return $this;
    }

    public function setPickerCell($value)
    {
        return $this->apiParas['picker_cell'] = $value;
        return $this;
    }

    public function setPikerId($value)
    {
        return $this->apiParas['piker_id'] = $value;
        return $this;
    }

    public function setTransportWay($value)
    {
        return $this->apiParas['transport_way'] = $value;
        return $this;
    }

    public function setOrderMark($value)
    {
        return $this->apiParas['order_mark'] = $value;
        return $this;
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

    public function setOutQty($value)
    {
        return $this->apiParas['out_qty'] = $value;
        return $this;
    }

    public function setGoodStatus($value)
    {
        return $this->apiParas['good_status'] = $value;
        return $this;
    }
}