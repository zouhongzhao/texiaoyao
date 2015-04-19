<?php

class WareListingGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.listing.get';
    }

    public function setCid ($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setEndModified ($endModified)
    {
        $this->apiParas['end_modified'] = $endModified;
        return $this;
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
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

    public function setStartModified ($startModified)
    {
        $this->apiParas['start_modified'] = $startModified;
        return $this;
    }
}