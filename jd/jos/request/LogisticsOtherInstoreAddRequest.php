<?php

class LogisticsOtherInstoreAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.otherInstore.add';
    }

    public function setInstoreType($value)
    {
        return $this->apiParas['instore_type'] = $value;
        return $this;
    }

    public function setPoNo($value)
    {
        return $this->apiParas['po_no'] = $value;
        return $this;
    }

    public function setExpectedDate($value)
    {
        return $this->apiParas['expected_date'] = $value;
        return $this;
    }

    public function setApprover($value)
    {
        return $this->apiParas['approver'] = $value;
        return $this;
    }

    public function setWarehouseNo($value)
    {
        return $this->apiParas['warehouse_no'] = $value;
        return $this;
    }

    public function setGoodsNo($value)
    {
        return $this->apiParas['goods_no'] = $value;
        return $this;
    }

    public function setIsvGoodsNo($value)
    {
        return $this->apiParas['isv_goods_no'] = $value;
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