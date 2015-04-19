<?php

class KuaicheZnScheduleFindScheduleCanUseRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.schedule.available.search';
    }

    public function setSpaceId ($spaceId)
    {
        $this->apiParas['space_id'] = $spaceId;
        return $this;
    }
}