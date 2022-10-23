<?php

namespace App\Http\Controllers;

use App\BaseModel;
use App\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return ResponseUtil::makeResponse($message, $result);
    }

    public function sendError($error, $code = 404)
    {
        return ResponseUtil::makeError($error, $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
        'success' => true,
        'message' => $message
        ], 200);
    }
    public function sendDataResponse($data,BaseModel $model = null)
    {
        $regFound = $model && property_exists($model->messages,'regFound') ? $model->messages['regFound'] : BaseModel::$messages['regFound'];
        $regNotFound = $model && property_exists($model->messages,'regNotFound') ? $model->messages['regNotFound'] : BaseModel::$messages['regNotFound'];
        $message = $data['total'] > 0 ? $regFound : $regNotFound;
        return $this->sendResponse($data,$message);
    }
}