<?php

class WareUpdateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.update';
    }

    public function setAttributes ($attributes)
    {
        $this->apiParas['attributes'] = $attributes;
        return $this;
    }

    public function setCostPrice ($costPrice)
    {
        $this->apiParas['cost_price'] = $costPrice;
        return $this;
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setHigh ($high)
    {
        $this->apiParas['high'] = $high;
        return $this;
    }

    public function setItemNum ($itemNum)
    {
        $this->apiParas['item_num'] = $itemNum;
        return $this;
    }

    public function setJdPrice ($jdPrice)
    {
        $this->apiParas['jd_price'] = $jdPrice;
        return $this;
    }

    public function setLength ($length)
    {
        $this->apiParas['length'] = $length;
        return $this;
    }

    public function setMarketPrice ($marketPrice)
    {
        $this->apiParas['market_price'] = $marketPrice;
        return $this;
    }

    public function setNotes ($notes)
    {
        $this->apiParas['notes'] = $notes;
        return $this;
    }

    public function setOptionType ($optionType)
    {
        $this->apiParas['option_type'] = $optionType;
        return $this;
    }

    public function setPackListing ($packListing)
    {
        $this->apiParas['pack_listing'] = $packListing;
        return $this;
    }

    public function setProducter ($producter)
    {
        $this->apiParas['producter'] = $producter;
        return $this;
    }

    public function setRate ($rate)
    {
        $this->apiParas['rate'] = $rate;
        return $this;
    }

    public function setService ($service)
    {
        $this->apiParas['service'] = $service;
        return $this;
    }

    public function setShopCategory ($shopCategory)
    {
        $this->apiParas['shop_category'] = $shopCategory;
        return $this;
    }

    public function setSkuPrices ($skuPrices)
    {
        $this->apiParas['sku_prices'] = $skuPrices;
        return $this;
    }

    public function setSkuProperties ($skuProperties)
    {
        $this->apiParas['sku_properties'] = $skuProperties;
        return $this;
    }

    public function setSkuStocks ($skuStocks)
    {
        $this->apiParas['sku_stocks'] = $skuStocks;
        return $this;
    }

    public function setTitle ($title)
    {
        $this->apiParas['title'] = $title;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }

    public function setUpcCode ($upcCode)
    {
        $this->apiParas['upc_code'] = $upcCode;
        return $this;
    }

    public function setWareId ($wareId)
    {
        $this->apiParas['ware_id'] = $wareId;
        return $this;
    }

    public function setWeight ($weight)
    {
        $this->apiParas['weight'] = $weight;
        return $this;
    }

    public function setWide ($wide)
    {
        $this->apiParas['wide'] = $wide;
        return $this;
    }

    public function setWrap ($wrap)
    {
        $this->apiParas['wrap'] = $wrap;
        return $this;
    }
}