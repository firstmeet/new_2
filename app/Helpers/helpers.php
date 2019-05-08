<?php

if (!function_exists('__t')){
    function __t($code,$lang='en')
    {
        if (session('lang')){
            $lang=session('lang');
        }
        return app(\App\Translate::class)->where([['code','=',$code],['lang','=',$lang]])->first(['cont']);
    }
}

if (!function_exists('ee')){

    function ee($str='',$isCut=true, $charset='utf-8')
    {
        header("Content-type: text/html; charset={$charset}");
        echo '<pre>';
        if(is_array($str) || is_object($str)){
            print_r($str);
        }else{
            echo $str;
        }
        echo '</pre>';
        if ($isCut) {
            exit;
        }
    }

}

if (!function_exists('apiReturn')){

    /**
     * [返回json格式数据]
     * @param  [array] $data 数组
     * @param  [int] $data['error'] 状态值 不传值或传0则为成功状态
     * @param  [int] $data['message'] 消息 不传值默认为‘操作成功提示’
     * @param  [int] $data['data'] 为实体数据
     * @return [json]  [返回数据]
     */
    function apiReturn($data = array()){
        $data['error']   = isset($data['error']) ? $data['error'] : 0;
        $data['message'] = isset($data['message']) ? $data['message'] : '操作成功！';

        $data['data']    = isset($data['data']) ? $data['data'] : null;
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($data));
    }

}

