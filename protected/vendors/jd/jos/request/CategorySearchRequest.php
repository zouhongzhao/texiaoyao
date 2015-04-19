<?php

class CategorySearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.warecats.get';
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }
}