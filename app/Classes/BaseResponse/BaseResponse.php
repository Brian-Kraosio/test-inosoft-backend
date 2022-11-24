<?php

namespace App\Classes\BaseResponse;

use Illuminate\Support\Facades\Facade;

/**
 * Class BaseResponse
 * @package App\Classes\BaseResponse
 * @method static \App\Classes\BaseResponse\BaseResponseFactory make(mixed $data)
 * @method static \App\Classes\BaseResponse\BaseResponseFactory makeError(string $message, array $errors = [])
 */
class BaseResponse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'base-response';
    }
}
