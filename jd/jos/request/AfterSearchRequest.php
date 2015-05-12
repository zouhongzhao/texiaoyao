<?php

class AfterSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.after.search';
    }

    public function setSelectFields ($selectFields)
    {
        $this->apiParas['select_fields'] = $selectFields;
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

    public function setQueryFields ($queryFields)
    {
        $this->apiParas['query_fields'] = $queryFields;
        return $this;
    }
}