<?php

class WareAddRequest extends JosRequest
{

    public function getApiMethod()
    {
        return '360buy.ware.add';
    }

    public function setCid($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setAttributes($attributes)
    {
        $this->apiParas['attributes'] = $attributes;
        return $this;
    }

    public function setCostPrice($costPrice)
    {
        $this->apiParas['cost_price'] = $costPrice;
        return $this;
    }

    public function setHigh($high)
    {
        $this->apiParas['high'] = $high;
        return $this;
    }

    public function setItemNum($itemNum)
    {
        $this->apiParas['item_num'] = $itemNum;
        return $this;
    }

    public function setJdPrice($jdPrice)
    {
        $this->apiParas['jd_price'] = $jdPrice;
        return $this;
    }

    public function setLength($length)
    {
        $this->apiParas['length'] = $length;
        return $this;
    }

    public function setMarketPrice($marketPrice)
    {
        $this->apiParas['market_price'] = $marketPrice;
        return $this;
    }

    public function setNotes($notes)
    {
        $this->apiParas['notes'] = $notes;
        return $this;
    }

    public function setOptionType($optionType)
    {
        $this->apiParas['option_type'] = $optionType;
        return $this;
    }

    public function setPackListing($packListing)
    {
        $this->apiParas['pack_listing'] = $packListing;
        return $this;
    }

    public function setProducter($producter)
    {
        $this->apiParas['producter'] = $producter;
        return $this;
    }

    public function setService($service)
    {
        $this->apiParas['service'] = $service;
        return $this;
    }

    public function setShopCategory($shopCategory)
    {
        $this->apiParas['shop_category'] = $shopCategory;
        return $this;
    }

    public function setSkuPrices($skuPrices)
    {
        $this->apiParas['sku_prices'] = $skuPrices;
        return $this;
    }

    public function setSkuProperties($skuProperties)
    {
        $this->apiParas['sku_properties'] = $skuProperties;
        return $this;
    }

    public function setSkuStocks($skuStocks)
    {
        $this->apiParas['sku_stocks'] = $skuStocks;
        return $this;
    }

    public function setStockNum($stockNum)
    {
        $this->apiParas['stock_num'] = $stockNum;
        return $this;
    }

    public function setTitle($title)
    {
        $this->apiParas['title'] = $title;
        return $this;
    }

    public function setTradeNo($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }

    public function setUpcCode($upcCode)
    {
        $this->apiParas['upc_code'] = $upcCode;
        return $this;
    }

    public function setWareImage($wareImage)
    {
        $this->apiParas['ware_image'] = $this->fileHanlder($wareImage);
        return $this;
    }

    public function setWeight($weight)
    {
        $this->apiParas['weight'] = $weight;
        return $this;
    }

    public function setWide($wide)
    {
        $this->apiParas['wide'] = $wide;
        return $this;
    }

    public function setWrap($wrap)
    {
        $this->apiParas['wrap'] = $wrap;
        return $this;
    }

    public function setOuterId($value)
    {
        $this->apiParas['outer_id'] = $value;
        return $this;
    }

    public function setPropertyAlias($value)
    {
        $this->apiParas['property_alias'] = $value;
        return $this;
    }

    public function setIsPayFirst($value)
    {
        $this->apiParas['is_pay_first'] = $value;
        return $this;
    }

    public function setIsCanVat($value)
    {
        $this->apiParas['is_can_vat'] = $value;
        return $this;
    }

    public function setIsImported($value)
    {
        $this->apiParas['is_imported'] = $value;
        return $this;
    }

    public function setIsHealthProduct($value)
    {
        $this->apiParas['is_health_product'] = $value;
        return $this;
    }

    public function setIsShelfLife($value)
    {
        $this->apiParas['is_shelf_life'] = $value;
        return $this;
    }

    public function setShelfLifeDays($value)
    {
        $this->apiParas['shelf_life_days'] = $value;
        return $this;
    }

    public function setIsSerialNo($value)
    {
        $this->apiParas['is_serial_no'] = $value;
        return $this;
    }

    public function setIsAppliancesCard($value)
    {
        $this->apiParas['is_appliances_card'] = $value;
        return $this;
    }

    public function setIsSpecialWet($value)
    {
        $this->apiParas['is_special_wet'] = $value;
        return $this;
    }

    public function setWareBigSmallModel($value)
    {
        $this->apiParas['ware_big_small_model'] = $value;
        return $this;
    }

    public function setWarePackType($value)
    {
        $this->apiParas['ware_pack_type'] = $value;
        return $this;
    }

    public function setInputPids($value)
    {
        $this->apiParas['input_pids'] = $value;
        return $this;
    }

    public function setInputStrs($value)
    {
        $this->apiParas['input_strs'] = $value;
        return $this;
    }

    public function setHasCheckCode($value)
    {
        $this->apiParas['has_check_code'] = $value;
        return $this;
    }

    public function setAdContent($value)
    {
        $this->apiParas['ad_content'] = $value;
        return $this;
    }

    public function setListTime($value)
    {
        $this->apiParas['list_time'] = $value;
        return $this;
    }
}