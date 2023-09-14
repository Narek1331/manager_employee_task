<?php
namespace App\Services;

use App\Models\User;

class UserService{

    /**
     * Create user.
     */
    public function store($name, $email, $password, $role_id){
        return User::create([
            'name' => $name,
            'email' => $email,
            'role_id' => $role_id,
            'password' => $password
        ]);
    }

    /**
     * Get users.
     */
    public function all(){
        return User::get();
    }

    /**
     * Get me info by id.
     */
    public function getMeInfo($id){
        return User::with('role')->find($id);
    }
}

?>
