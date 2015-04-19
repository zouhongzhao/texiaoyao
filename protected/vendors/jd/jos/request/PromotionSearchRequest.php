<?php

class PromotionSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return "360buy.promotion.search";
    }

    public function setCheckStatus ($checkStatus)
    {
        $this->apiParas['check_status'] = $checkStatus;
        return $this;
    }

    public function setEvtId ($evtId)
    {
        $this->apiParas['evt_id'] = $evtId;
        return $this;
    }

    public function setEvtStatus ($evtStatus)
    {
        $this->apiParas['evt_status'] = $evtStatus;
        return $this;
    }

    public function setEvtType ($evtType)
    {
        $this->apiParas['evt_type'] = $evtType;
        return $this;
    }

    public function setLevelMember ($levelMember)
    {
        $this->apiParas['level_member'] = $levelMember;
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

    public function setTimeBeginEnd ($timeBegin_end)
    {
        $this->apiParas['time_begin_end'] = $timeBegin_end;
        return $this;
    }

    public function setTimeBeginStart ($timeBegin_start)
    {
        $this->apiParas['time_begin_start'] = $timeBegin_start;
        return $this;
    }

    public function setTimeEndEnd ($timeEnd_end)
    {
        $this->apiParas['time_end_end'] = $timeEnd_end;
        return $this;
    }

    public function setTimeEndStart ($timeEnd_start)
    {
        $this->apiParas['time_end_start'] = $timeEnd_start;
        return $this;
    }

    public function setWareId ($wareId)
    {
        $this->apiParas['ware_id'] = $wareId;
        return $this;
    }

    public function setSkuId ($skuId)
    {
        $this->apiParas['sku_id'] = $skuId;
        return $this;
    }
}