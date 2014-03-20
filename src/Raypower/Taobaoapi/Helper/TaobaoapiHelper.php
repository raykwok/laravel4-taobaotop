<?php


namespace Raypower\Taobaoapi\Helper;

use Taobaoapi;
use Taobao\Top\Request\TbkShopsGetRequest;

class TaobaoapiHelper
{
    const TBK_SHOP_SORT_COMMISSION_RATE = 'commission_rate';
    const TBK_SHOP_SORT_AUCTION_COUNT = 'auction_count';
    const TBK_SHOP_SORT_TOTAL_AUCTION = 'total_auction';

    /**
     * 搜索淘宝客店铺
     * @param int $cid
     * @param int $page
     * @param int $pageSize
     * @param string $sortField
     * @param string $sortType
     * @param bool $only_mall
     * @return mixed
     */
    public static function getTbkShops($cid, $page = 1, $pageSize = 40, $sortField = '', $sortType = 'desc', $only_mall = true)
    {
        $req = new TbkShopsGetRequest();
        $req->setFields('user_id,seller_nick,shop_title,pic_url,shop_url');
        $req->setCid($cid);
        $req->setPageNo($page);
        $req->setPageSize($pageSize);
        $req->setSortField($sortField);
        $req->setSortType($sortType);
        if ($only_mall) {
            $req->setOnlyMall('true');
        }

        return Taobaoapi::setRandAppkeyByGroup('taobaoke')->execute($req);
    }
} 