<?php

class LogisticsReturnorderAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.returnorder.add';
    }

    public function setSellerNo($value)
    {
        return $this->apiParas['seller_no'] = $value;
        return $this;
    }

    public function setWarehouseNo($value)
    {
        return $this->apiParas['warehouse_no'] = $value;
        return $this;
    }

    public function setInboundNo($value)
    {
        return $this->apiParas['inbound_no'] = $value;
        return $this;
    }

    public function setJoslOutboundNo($value)
    {
        return $this->apiParas['josl_outbound_no'] = $value;
        return $this;
    }

    public function setExpectedDate($value)
    {
        return $this->apiParas['expected_date'] = $value;
        return $this;
    }

    public function setIsvSource($value)
    {
        return $this->apiParas['isv_source'] = $value;
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

    public function setStockMark($value)
    {
        return $this->apiParas['stock_mark'] = $value;
        return $this;
    }
}