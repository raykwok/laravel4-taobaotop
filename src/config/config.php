<?php
return array(
    /**
     * api response data format, support: json|xml
     * api响应数据格式，目前支持: json|xml
     */
    'format' => 'json',

    /**
     * CURLOPT_TIMEOUT option for curl
     * curl执行超时时间
     */
    'readTimeout' => 30,

    /**
     * CURLOPT_CONNECTTIMEOUT option for curl
     * curl请求超时时间
     */
    'connectTimeout' => 10,

    /**
     * appkeys
     * format: appkey,secretKey
     * 格式: appkey,secretKey
     *
     * Example:
     * 'appkeys' => array(
     *     '21100000,13c51ce419497a6b4c2a82a03f7b4ca5',
     *     '21187480,9eca0febb018b3aeb7245e691f03b15c',
     *  ),
     */
    'appkeys' => array(
        '12515302,13c51ce419497a6b4c2a82a03f7b4ca5',
        '21195780,9eca0febb018b3aeb7245e691f03b15c',
    ),
);