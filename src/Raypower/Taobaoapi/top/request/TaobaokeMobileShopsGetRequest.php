<?php namespace Taobao\Top\Request;
/**
 * TOP API: taobao.taobaoke.mobile.shops.get request
 * 
 * @author auto create
 * @since 1.0, 2013-10-10 16:51:20
 */
class TaobaokeMobileShopsGetRequest
{
	/** 
	 * 店铺前台展示类目id，可以通过taobao.shopcats.list.get获取。
	 **/
	private $cid;
	
	/** 
	 * 店铺商品数查询结束值。需要跟start_auctioncount同时设置才生效，只设置该值不生效。
	 **/
	private $endAuctioncount;
	
	/** 
	 * 店铺佣金比例查询结束值
	 **/
	private $endCommissionrate;
	
	/** 
	 * 店铺掌柜信用等级查询结束
店铺的信用等级总共为20级 1-5:1heart-5heart;6-10:1diamond-5diamond;11-15:1crown-5crown;16-20:1goldencrown-5goldencrown
	 **/
	private $endCredit;
	
	/** 
	 * 店铺累计推广数查询结束值
	 **/
	private $endTotalaction;
	
	/** 
	 * 需要返回的字段，目前包括如下字段 user_id click_url shop_title commission_rate seller_credit shop_type auction_count total_auction
	 **/
	private $fields;
	
	/** 
	 * 店铺主题关键字查询
	 **/
	private $keyword;
	
	/** 
	 * 是否只显示商城店铺
	 **/
	private $onlyMall;
	
	/** 
	 * 自定义输入串.格式:英文和数字组成;长度不能大于12个字符,区分不同的推广渠道,如:bbs,表示bbs为推广渠道;blog,表示blog为推广渠道.
	 **/
	private $outerCode;
	
	/** 
	 * 页码.结果页1~99
	 **/
	private $pageNo;
	
	/** 
	 * 每页条数.最大每页40
	 **/
	private $pageSize;
	
	/** 
	 * 排序字段。目前支持的排序字段有：
commission_rate，auction_count，total_auction。必须输入这三个任意值，否则排序无效
	 **/
	private $sortField;
	
	/** 
	 * 排序类型.必须输入desc,asc任一值，否则无效
desc-降序,asc-升序
	 **/
	private $sortType;
	
	/** 
	 * 店铺宝贝数查询开始值。需要跟end_auctioncount同时设置才生效，只设置该值不生效。
	 **/
	private $startAuctioncount;
	
	/** 
	 * 店铺佣金比例查询开始值，注意佣金比例是x10000的整数.50表示0.5%
	 **/
	private $startCommissionrate;
	
	/** 
	 * 店铺掌柜信用等级起始
店铺的信用等级总共为20级 1-5:1heart-5heart;6-10:1diamond-5diamond;11-15:1crown-5crown;16-20:1goldencrown-5goldencrown
	 **/
	private $startCredit;
	
	/** 
	 * 店铺累计推广量开始值
	 **/
	private $startTotalaction;
	
	private $apiParas = array();
	
	public function setCid($cid)
	{
		$this->cid = $cid;
		$this->apiParas["cid"] = $cid;
	}

	public function getCid()
	{
		return $this->cid;
	}

	public function setEndAuctioncount($endAuctioncount)
	{
		$this->endAuctioncount = $endAuctioncount;
		$this->apiParas["end_auctioncount"] = $endAuctioncount;
	}

	public function getEndAuctioncount()
	{
		return $this->endAuctioncount;
	}

	public function setEndCommissionrate($endCommissionrate)
	{
		$this->endCommissionrate = $endCommissionrate;
		$this->apiParas["end_commissionrate"] = $endCommissionrate;
	}

	public function getEndCommissionrate()
	{
		return $this->endCommissionrate;
	}

	public function setEndCredit($endCredit)
	{
		$this->endCredit = $endCredit;
		$this->apiParas["end_credit"] = $endCredit;
	}

	public function getEndCredit()
	{
		return $this->endCredit;
	}

	public function setEndTotalaction($endTotalaction)
	{
		$this->endTotalaction = $endTotalaction;
		$this->apiParas["end_totalaction"] = $endTotalaction;
	}

	public function getEndTotalaction()
	{
		return $this->endTotalaction;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setKeyword($keyword)
	{
		$this->keyword = $keyword;
		$this->apiParas["keyword"] = $keyword;
	}

	public function getKeyword()
	{
		return $this->keyword;
	}

	public function setOnlyMall($onlyMall)
	{
		$this->onlyMall = $onlyMall;
		$this->apiParas["only_mall"] = $onlyMall;
	}

	public function getOnlyMall()
	{
		return $this->onlyMall;
	}

	public function setOuterCode($outerCode)
	{
		$this->outerCode = $outerCode;
		$this->apiParas["outer_code"] = $outerCode;
	}

	public function getOuterCode()
	{
		return $this->outerCode;
	}

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["page_no"] = $pageNo;
	}

	public function getPageNo()
	{
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function setSortField($sortField)
	{
		$this->sortField = $sortField;
		$this->apiParas["sort_field"] = $sortField;
	}

	public function getSortField()
	{
		return $this->sortField;
	}

	public function setSortType($sortType)
	{
		$this->sortType = $sortType;
		$this->apiParas["sort_type"] = $sortType;
	}

	public function getSortType()
	{
		return $this->sortType;
	}

	public function setStartAuctioncount($startAuctioncount)
	{
		$this->startAuctioncount = $startAuctioncount;
		$this->apiParas["start_auctioncount"] = $startAuctioncount;
	}

	public function getStartAuctioncount()
	{
		return $this->startAuctioncount;
	}

	public function setStartCommissionrate($startCommissionrate)
	{
		$this->startCommissionrate = $startCommissionrate;
		$this->apiParas["start_commissionrate"] = $startCommissionrate;
	}

	public function getStartCommissionrate()
	{
		return $this->startCommissionrate;
	}

	public function setStartCredit($startCredit)
	{
		$this->startCredit = $startCredit;
		$this->apiParas["start_credit"] = $startCredit;
	}

	public function getStartCredit()
	{
		return $this->startCredit;
	}

	public function setStartTotalaction($startTotalaction)
	{
		$this->startTotalaction = $startTotalaction;
		$this->apiParas["start_totalaction"] = $startTotalaction;
	}

	public function getStartTotalaction()
	{
		return $this->startTotalaction;
	}

	public function getApiMethodName()
	{
		return "taobao.taobaoke.mobile.shops.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->fields,"fields");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
