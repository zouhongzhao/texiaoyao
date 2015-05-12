<?php

class LogisticsStockSearchRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.stock.search';
    }

    public function setGoodsNo($value)
    {
        return $this->apiParas['goods_no'] = $value;
        return $this;
    }

    public function setCurrentPage($value)
    {
        return $this->apiParas['current_page'] = $value;
        return $this;
    }

    public function setWareHouseNo($value)
    {
        return $this->apiParas['warehouse_no'] = $value;
        return $this;
    }
}