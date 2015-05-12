<?php

class ApiController extends Controller
{
	public $defaultAction = 'login';
	public $layout='login';

	public function actionJd(){
		if (isset($_GET['code'])) {
			print_r($_GET);die;
		}
	}
	
	public function actionJdList(){
		$model = new JdApi;
		print_r($model->wares());die;
		 JdApi::model()->wares();
	}
}