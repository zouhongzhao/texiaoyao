<?php

class KuaicheZnPlanSearchModifyRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.plan.search.modify';
    }

    public function setPlanInfo ($info)
    {
        $this->apiParas['plan_info'] = $info;
        return $this;
    }
}