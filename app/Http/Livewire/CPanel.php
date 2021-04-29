<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Rules\CurrentPassword;

class CPanel extends Component
{
    /**
     * This method updates the current user
     */
    public function updateUser()
    {
        $rules = [];

        // Name
        if (
            !empty(request()->name) &&
            request()->name != auth()->user()->name
        ) {
            $rules['name'] = 'sometimes|required|string|between:5,255';
        }

        // Password
        if (
            !empty(request()->current_password) &&
            !empty(request()->password) &&
            !empty(request()->password_confirmation)
        ) {
            $rules = array_merge(
                $rules, [
                    'current_password' => [
                        'exclude_if:password,null', 'exclude_if:password_confirmation,null', 'required','between:8,25', new CurrentPassword
                    ],
                    'password' => [
                        'exclude_if:current_password,null', 'exclude_if:password_confirmation,null', 'required', 'between:8,25'
                    ],
                    'password_confirmation' => [
                        'required', 'exclude_if:current_password,null', 'exclude_if:password,null', 'same:password'
                    ]
                ]
            );
        }

        if (!$rules) {
            return back()->withErrors([
                __('cpanel.update-common-error')
            ]);
        }

        // Validation
        $valid = Validator::make(
            request()->input(),
            $rules
        );

        if ($valid->fails()) {
            return back()->withInput()->withErrors($valid->errors());
        }

        // Setting the name
        if (!empty($rules['name'])) {
            request()->user()->name = request('name', request()->user()->name);
        }

        // Setting the password
        if (!empty($rules['password'])) {
            auth()->user()->password = bcrypt(request()->password);
        }

        if (
            !auth()->user()->save()
        ) {
            return back()->withInput()->withError(
                    __('model.failure', [
                        'model' => User::class
                    ]));
        }

        return redirect()->route('cpanel.index')->withSuccess("Account have been updated succesfully.");
    }

    public function render()
    {
        return view('livewire.c-panel')
                ->extends('layouts.admin', [
                    'pagetitle' => __('cpanel.title', [
                        'user' => auth()->user()->name,
                    ]),
                    'title' => __('cpanel.welcome', [
                        'owner' => auth()->user()->name
                    ])
                ])
                ->section('main');
    }
}
