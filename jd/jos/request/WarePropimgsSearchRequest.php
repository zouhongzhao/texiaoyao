<?php
class WarePropimgsSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.ware.propimgs.search';
    }

    public function setWareId ($value)
    {
        $this->apiParas['ware_id'] = $value;
        return $this;
    }

    public function setPage ($value)
    {
        $this->apiParas['page'] = $value;
        return $this;
    }

    public function setPageSize ($value)
    {
        $this->apiParas['page_size'] = $value;
        return $this;
    }

    public function setFields ($value)
    {
        $this->apiParas['fields'] = $value;
        return $this;
    }
}