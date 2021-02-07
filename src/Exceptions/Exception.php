<?php

namespace PHPHos\Laravel\Exceptions;

use Symfony\Component\HttpFoundation\Response as Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Exception extends HttpException
{
    /**
     * 异常信息: 默认错误信息.
     */
    const FAIL = '操作失败.';
    /**
     * 异常信息: 接口权限错误.
     */
    const ISV_INV_AUTHOR = 'isv.method-author-error.';
    /**
     * 异常信息: 返回类型错误.
     */
    const ISV_INV_FORMAT = 'isv.unsupport-format.';
    /**
     * 异常信息: 接口错误.
     */
    const ISV_INV_METHOD = 'isv.method-error.';
    /**
     * 异常信息: 无效的参数.
     */
    const ISV_INV_PARAMETER = 'isv.invalid-parameter:{{ key }}.';
    /**
     * 异常信息: APP 错误.
     */
    const ISV_INV_SESSION = 'isv.invalid-app-session.';
    /**
     * 异常信息: 签名错误.
     */
    const ISV_INV_SIGN = 'isv.sign-error.';
    /**
     * 异常信息: 签名方法错误.
     */
    const ISV_INV_SIGN_METHOD = 'isv.sign-method-error.';
    /**
     * 异常信息: 时间错误.
     */
    const ISV_INV_TIMESTAMP = 'isv.timestamp-error.';
    /**
     * 异常信息: TOKEN 错误.
     */
    const ISV_INV_TOKEN = 'isv.invalid-parameter:token.';

    /**
     * 失败.
     * 
     * @param string $message 错误信息.
     * @param int $code 错误编码.
     * @param int $status 状态编码.
     * @return void
     */
    public static function fail(
        string $message,
        int $code = Http::HTTP_BAD_REQUEST,
        int $status = Http::HTTP_BAD_REQUEST
    ): void {
        $statuses = array_keys(Http::$statusTexts);

        if (!in_array($status, $statuses)) {
            $status = Http::HTTP_INTERNAL_SERVER_ERROR;
            $code = Http::HTTP_INTERNAL_SERVER_ERROR;
            $message = Http::$statusTexts[Http::HTTP_INTERNAL_SERVER_ERROR];
        }

        throw new static($status, $message, null, [], $code);
    }
}
