<?php

class LogisticsSkuAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.sku.add';
    }

    public function setBarCode($value)
    {
        $this->apiParas['bar_code'] = $value;
        return $this;
    }

    public function setSkuId($value)
    {
        $this->apiParas['sku_id'] = $value;
        return $this;
    }

    public function setName($value)
    {
        $this->apiParas['name'] = $value;
        return $this;
    }

    public function setGoodsAbbreviation($value)
    {
        $this->apiParas['goods_abbreviation'] = $value;
        return $this;
    }

    public function setCategoryId($value)
    {
        $this->apiParas['category_id'] = $value;
        return $this;
    }

    public function setCategoryName($value)
    {
        $this->apiParas['category_name'] = $value;
        return $this;
    }

    public function setBrandNo($value)
    {
        $this->apiParas['brand_no'] = $value;
        return $this;
    }

    public function setBrandName($value)
    {
        $this->apiParas['brand_name'] = $value;
        return $this;
    }

    public function setFormat($value)
    {
        $this->apiParas['format'] = $value;
        return $this;
    }

    public function setColor($value)
    {
        $this->apiParas['color'] = $value;
        return $this;
    }

    public function setSize($value)
    {
        $this->apiParas['size'] = $value;
        return $this;
    }

    public function setGrossWeight($value)
    {
        $this->apiParas['gross_weight'] = $value;
        return $this;
    }

    public function setNetWeight($value)
    {
        $this->apiParas['net_weight'] = $value;
        return $this;
    }

    public function setSizeDefinition($value)
    {
        $this->apiParas['size_definition'] = $value;
        return $this;
    }

    public function setSuppliersName($value)
    {
        $this->apiParas['suppliers_name'] = $value;
        return $this;
    }

    public function setManufacturer($value)
    {
        $this->apiParas['manufacturer'] = $value;
        return $this;
    }

    public function setSuppliersNo($value)
    {
        $this->apiParas['suppliers_no'] = $value;
        return $this;
    }

    public function setProductArea($value)
    {
        $this->apiParas['product_area'] = $value;
        return $this;
    }

    public function setLength($value)
    {
        $this->apiParas['length'] = $value;
        return $this;
    }

    public function setWidth($value)
    {
        $this->apiParas['width'] = $value;
        return $this;
    }

    public function setHeight($value)
    {
        $this->apiParas['height'] = $value;
        return $this;
    }

    public function setVolume($value)
    {
        $this->apiParas['volume'] = $value;
        return $this;
    }

    public function setIsSafe($value)
    {
        $this->apiParas['is_safe'] = $value;
        return $this;
    }

    public function setSafeDate($value)
    {
        $this->apiParas['safe_date'] = $value;
        return $this;
    }
}