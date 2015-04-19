<?php

class KuaicheAccountIncome_expenseSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.account.income_expense.search';
    }

    /**
     * 收支类型,1收入，2支出
     *
     * @param unknown $inOutType            
     * @return KuaicheAccountIncome_expenseSearchRequest
     */
    public function setInOutType ($inOutType)
    {
        $this->apiParas['in_out_type'] = $inOutType;
        return $this;
    }

    /**
     * 投放类型：1201 列表页;1202 搜索页
     *
     * @param unknown $type            
     * @return KuaicheAccountIncome_expenseSearchRequest
     */
    public function setType ($type)
    {
        $this->apiParas['type'] = $type;
        return $this;
    }

    /**
     * 0，最近一周1，最近一个月,2，最近三个月
     *
     * @param unknown $checkType            
     * @return KuaicheAccountIncome_expenseSearchRequest
     */
    public function setCheckType ($checkType)
    {
        $this->apiParas['check_type'] = $checkType;
        return $this;
    }

    public function setPageIndex ($pageIndex)
    {
        $this->apiParas['page_index'] = $pageIndex;
        return $this;
    }

    public function setPageSize ($pageSize)
    {
        $this->apiParas['page_size'] = $pageSize;
        return $this;
    }
}