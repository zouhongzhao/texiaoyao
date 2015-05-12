<?php

class WareProductCatelogyListGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.ware.product.catelogy.list.get';
    }

    public function setCatelogyId ($v)
    {
        $this->apiParas['catelogyId'] = $v;
        return $this;
    }

    public function setLevel ($v)
    {
        $this->apiParas['level'] = $v;
        return $this;
    }

    public function setIsIcon ($v)
    {
        $this->apiParas['isIcon'] = $v;
        return $this;
    }

    public function setIsDescription ($v)
    {
        $this->apiParas['isDescription'] = $v;
        return $this;
    }

    public function setClient ($fields)
    {
        $this->apiParas['client'] = $fields;
        return $this;
    }
}