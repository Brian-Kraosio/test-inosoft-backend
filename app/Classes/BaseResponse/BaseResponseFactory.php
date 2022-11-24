<?php


namespace App\Classes\BaseResponse;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class BaseResponseFactory implements Responsable
{
    private $data = [];
    private $status = Response::HTTP_OK;
    private $success = true;
    private $message;
    private $errors = [];

    public function __construct()
    {
        return $this;
    }

    public function make($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $message
     * @param array $errors
     * @return BaseResponseFactory
     */
    public function makeError(string $message, $errors = [])
    {
        $this->success = false;
        $this->message = $message;
        $this->errors = $errors;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function toResponse($request)
    {
        return $this->createResponse();
    }

    private function createResponse()
    {
        if ($this->success) {
            return response()->json([
                'code' => $this->status,
                'success' => true,
                'data' => $this->data,
            ], $this->status);
        } else {
            return response()->json(array_merge([
                'code' => $this->status,
                'success' => false,
                'message' => $this->message,
            ], count($this->errors) > 0 ? ['errors' => collect($this->errors)->map(function ($value) {
                return $value[0];
            })] : []), $this->status);
        }
    }
}
