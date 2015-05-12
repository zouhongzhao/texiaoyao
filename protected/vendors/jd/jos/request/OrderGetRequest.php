<?php
class OrderGetRequest extends JosRequest {
	public function getApiMethod() {
		return '360buy.order.get';
	}
	public function setOptionalFields($optionalFields) {
		$this->apiParas ['optional_fields'] = $optionalFields;
		return $this;
	}
	public function setOrderId($orderId) {
		$this->apiParas ['order_id'] = $orderId;
		return $this;
	}
	public function setOrderState($orderState) {
		$this->apiParas ['order_state'] = $orderState;
		return $this;
	}
}