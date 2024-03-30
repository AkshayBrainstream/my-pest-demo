<?php
// tests/Feature/UserAuthTest.php

use App\UserAuth;

beforeEach(function () {
    $this->auth = new UserAuth();
});

it('registers a new user successfully', function () {
    expect($this->auth->register('newuser', 'password'))->toBeTrue();
});

it('prevents registration with a taken username', function () {
    $this->auth->register('user', 'password');
    expect($this->auth->register('user', 'newpassword'))->toBeFalse();
});

it('logs in a registered user with the correct password', function () {
    $this->auth->register('user', 'password');
    expect($this->auth->login('user', 'password'))->toBeTrue();
});

it('prevents login with an incorrect password', function () {
    $this->auth->register('user', 'password');
    expect($this->auth->login('user', 'wrongpassword'))->toBeFalse();
});
