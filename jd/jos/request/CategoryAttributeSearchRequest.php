<?php

class CategoryAttributeSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.get.attribute';
    }

    public function setAid ($aid)
    {
        $this->apiParas['aid'] = $aid;
        return $this;
    }

    public function setCid ($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }

    public function setIsKeyProp ($isKeyProp)
    {
        $this->apiParas['is_key_prop'] = $isKeyProp;
        return $this;
    }

    public function setIsSaleProp ($isSaleProp)
    {
        $this->apiParas['is_sale_prop'] = $isSaleProp;
        return $this;
    }
}