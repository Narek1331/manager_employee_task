<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Create a new UserService instance.
     *
     * @return void
     */
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployees()
    {
        $employees = $this->user_service->getEmployeeUsers();

        return response()->json([
            'status' => true,
            'datas' => $employees
        ],200);
    }
}
