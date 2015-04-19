<?php

class KuaicheZnBidRankGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.bid.rank.get';
    }

    public function setPlanJson ($planJson)
    {
        $this->apiParas['plan_json'] = $planJson;
        return $this;
    }

    public function setCid ($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setKwgId ($kwgId)
    {
        $this->apiParas['kwg_id'] = $kwgId;
        return $this;
    }

    public function setPlanDate ($planDate)
    {
        $this->apiParas['plan_date'] = $planDate;
        return $this;
    }
}