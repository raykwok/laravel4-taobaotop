<?php namespace Taobao\Top\Request;
/**
 * TOP API: taobao.ump.mbbs.list.get request
 * 
 * @author auto create
 * @since 1.0, 2014-03-19 17:12:54
 */
class UmpMbbsListGetRequest
{
	/** 
	 * 营销积木块id组成的字符串。
	 **/
	private $ids;
	
	private $apiParas = array();
	
	public function setIds($ids)
	{
		$this->ids = $ids;
		$this->apiParas["ids"] = $ids;
	}

	public function getIds()
	{
		return $this->ids;
	}

	public function getApiMethodName()
	{
		return "taobao.ump.mbbs.list.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->ids,"ids");
		RequestCheckUtil::checkMaxListSize($this->ids,20,"ids");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
