<?php

class WareInfoByInfoRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.wares.search';
    }

    public function setCid ($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setEndPrice ($endPrice)
    {
        $this->apiParas['end_price'] = $endPrice;
        return $this;
    }

    public function setOrderBy ($orderBy)
    {
        $this->apiParas['order_by'] = $orderBy;
        return $this;
    }

    public function setPage ($page)
    {
        $this->apiParas['page'] = $page;
        return $this;
    }

    public function setPageSize ($pageSize)
    {
        $this->apiParas['page_size'] = $pageSize;
        return $this;
    }

    public function setStartPrice ($startPrice)
    {
        $this->apiParas['start_price'] = $startPrice;
        return $this;
    }

    public function setTitle ($title)
    {
        $this->apiParas['title'] = $title;
        return $this;
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }
}