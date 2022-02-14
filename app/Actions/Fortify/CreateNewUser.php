<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        $user = new User();
        $user->firstname = $input['firstname'];
        $user->lastname = $input['lastname'];
        $user->phone = $input['phone'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->code = Hash::make($input['email']);
        $user->save();
        return $user;

        // return User::create([
        //     'firstname' => $input['firstname'],
        //     'lastname' => $input['lastname'],
        //     'phone' => $input['phone'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
    }
}
