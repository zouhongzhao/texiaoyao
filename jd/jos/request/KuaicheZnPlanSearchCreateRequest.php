<?php

class KuaicheZnPlanSearchCreateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.plan.search.create';
    }

    public function setPlanInfo ($info)
    {
        $this->apiParas['plan_info'] = $info;
        return $this;
    }
}