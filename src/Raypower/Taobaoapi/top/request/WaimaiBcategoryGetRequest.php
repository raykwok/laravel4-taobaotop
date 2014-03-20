<?php namespace Taobao\Top\Request;
/**
 * TOP API: taobao.waimai.bcategory.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-19 17:12:54
 */
class WaimaiBcategoryGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.waimai.bcategory.get";
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
