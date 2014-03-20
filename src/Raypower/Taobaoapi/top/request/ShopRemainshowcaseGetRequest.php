<?php namespace Taobao\Top\Request;
/**
 * TOP API: taobao.shop.remainshowcase.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-19 17:12:54
 */
class ShopRemainshowcaseGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.shop.remainshowcase.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
