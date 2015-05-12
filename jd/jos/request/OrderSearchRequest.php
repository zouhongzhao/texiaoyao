<?php

class OrderSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.order.search';
    }

    public function setEndDate ($endDate)
    {
        $this->apiParas['end_date'] = $endDate;
        return $this;
    }

    public function setOptionalFields ($optionalFields)
    {
        $this->apiParas['optional_fields'] = $optionalFields;
        return $this;
    }

    public function setOrderState ($orderState)
    {
        $this->apiParas['order_state'] = $orderState;
        return $this;
    }

    public function addOrderState ($state)
    {
        $s = strval($this->apiParas['order_state']);
        $s = explode(',', $s);
        $s[] = $state;
        foreach ($s as $k => $v) {
            if (! $v)
                unset($s[$k]);
        }
        $s = array_unique($s);
        $this->apiParas['order_state'] = implode(',', $s);
        return $this;
    }

    public function removeOrderState ($state)
    {
        $s = strval($this->apiParas['order_state']);
        $s = explode(',', $s);
        $s = array_flip($s);
        unset($s[$state]);
        $this->apiParas['order_state'] = implode(',', array_keys($s));
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

    public function setStartDate ($startDate)
    {
        $this->apiParas['start_date'] = $startDate;
        return $this;
    }
}