<?php

return [
    'title' => "CPanel of :user",
    'welcome' => 'Welcome :owner',
    'users-panel' => "User's panel",
    'update-user' => "Update user info",
    'name' => 'Name',
    'email' => 'Email',
    'current_password' => 'Current password',
    'new_password' => 'New password',
    'password' => 'Password',
    'password-confirmation' => 'Password confirmation',
    'empty-form' => 'You have send me an empty form',
    'update-common-error' => 'Name or password or both were provided inappropriatly.',
    'rules' => [
        'name' => "Name should have min: 5, max: 255 characters type of alpha-numeric, space, -.",
        'password' => "Password should have min: 8, max: 25 characters type of alpha-numeric, special signs.",
        'current_password' => "Your current password.",
        'password_confirmation' => "The same password you typed in the New password field."
    ]
];

?>