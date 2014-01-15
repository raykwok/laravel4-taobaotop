<?php


namespace Raypower\Taobaoapi;

use TopClient;
use stdClass;
use Config;

class Taobaoapi extends TopClient
{
    public function __construct()
    {
        //api response data format api响应数据格式
        if (Config::get('taobaoapi::format'))
            $this->format = Config::get('taobaoapi::format');

        //time out for curl
        if (Config::get('taobaoapi::readTimeout'))
            $this->readTimeout = Config::get('taobaoapi::readTimeout');

        //connection time out for curl
        if (Config::get('taobaoapi::connectTimeout'))
            $this->connectTimeout = Config::get('taobaoapi::connectTimeout');

        //appkey
        $appkeys = Config::get('taobaoapi::appkeys');
        $randKey = array_rand($appkeys, 1);
        $randAppkeyStr = $appkeys[$randKey];
        $randAppkey = explode(',', $randAppkeyStr);
        if (isset($randAppkey[0]) && isset($randAppkey[1])) {
            $this->appkey = $randAppkey[0];
            $this->secretKey = $randAppkey[1];
        }
    }

    /**
     * 保存日志
     * @param string $apiName
     * @param string $requestUrl
     * @param string $errorCode
     * @param string $responseTxt
     */
    protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt)
    {
        return;
    }

    /**
     * @param $request
     * @param null $session
     * @return mixed|\SimpleXMLElement|stdClass
     */
    public function execute($request, $session = null)
    {
        $result = new stdClass();
        if ($this->checkRequest) {
            try {
                $request->check();
            } catch (Exception $e) {
                $result->code = $e->getCode();
                $result->msg = $e->getMessage();
                return $result;
            }
        }
        //组装系统参数
        $sysParams["app_key"] = $this->appkey;
        $sysParams["v"] = $this->apiVersion;
        $sysParams["format"] = $this->format;
        $sysParams["sign_method"] = $this->signMethod;
        $sysParams["method"] = $request->getApiMethodName();
        $sysParams["timestamp"] = date("Y-m-d H:i:s");
        $sysParams["partner_id"] = $this->sdkVersion;
        if (null != $session) {
            $sysParams["session"] = $session;
        }

        //获取业务参数
        $apiParams = $request->getApiParas();

        //签名
        $sysParams["sign"] = $this->generateSign(array_merge($apiParams, $sysParams));

        //系统参数放入GET请求串
        $requestUrl = $this->gatewayUrl . "?";
        foreach ($sysParams as $sysParamKey => $sysParamValue) {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        $requestUrl = substr($requestUrl, 0, -1);

        //发起HTTP请求
        try {
            $resp = $this->curl($requestUrl, $apiParams);
        } catch (Exception $e) {
            $this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
            $result->code = $e->getCode();
            $result->msg = $e->getMessage();
            return $result;
        }

        //解析TOP返回结果
        $respWellFormed = false;
        if ("json" == $this->format) {
            $respObject = json_decode($resp);
            if (null !== $respObject) {
                $respWellFormed = true;
                foreach ($respObject as $propKey => $propValue) {
                    $respObject = $propValue;
                }
            }
        } else if ("xml" == $this->format) {
            $respObject = @simplexml_load_string($resp);
            if (false !== $respObject) {
                $respWellFormed = true;
            }
        }

        //返回的HTTP文本不是标准JSON或者XML，记下错误日志
        if (false === $respWellFormed) {
            $this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_RESPONSE_NOT_WELL_FORMED", $resp);
            $result->code = 0;
            $result->msg = "HTTP_RESPONSE_NOT_WELL_FORMED";
            return $result;
        }

        //如果TOP返回了错误码，记录到业务错误日志中
        if (isset($respObject->code)) {
            $this->logCommunicationError($sysParams["method"], $requestUrl, "API_RESPONSE_ERROR", $resp);
        }
        return $respObject;
    }

    /**
     * 设置appkey
     * @param string $value
     */
    /**
     * 设置appkey
     * @param string $value
     * @return $this
     */
    public function setAppkey($value)
    {
        $this->appkey = $value;
        return $this;
    }

    /**
     * 设置secretKey
     * @param string $value
     * @return $this
     */
    public function setSecretKey($value)
    {
        $this->secretKey = $value;
        return $this;
    }
}