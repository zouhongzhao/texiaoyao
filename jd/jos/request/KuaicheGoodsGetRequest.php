<?php

class KuaicheGoodsGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.goods.get';
    }

    public function setSkuId ($skuId)
    {
        $this->apiParas['sku_id'] = $skuId;
        return $this;
    }
}