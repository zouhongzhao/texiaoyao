<?php

class LogisticsPoAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.po.add';
    }

    public function setChannelsSellerNo($value)
    {
        return $this->apiParas['channels_seller_no'] = $value;
        return $this;
    }

    public function setPoNo($value)
    {
        return $this->apiParas['po_no'] = $value;
        return $this;
    }

    public function setWarehouseNo($value)
    {
        return $this->apiParas['warehouse_no'] = $value;
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

    public function setGoodsNo($value)
    {
        return $this->apiParas['goods_no'] = $value;
        return $this;
    }

    public function setExpectedQty($value)
    {
        return $this->apiParas['expected_qty'] = $value;
        return $this;
    }

    public function setGoodsStatus($value)
    {
        return $this->apiParas['goods_status'] = $value;
        return $this;
    }
}