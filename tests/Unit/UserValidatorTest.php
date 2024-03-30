<?php

use App\UserValidator;

beforeEach(function () {
    $this->validator = new UserValidator();
});

it('validates names correctly', function () {
    expect($this->validator->validateName('Jo'))->toBeTrue();
    expect($this->validator->validateName(''))->toBeFalse();
    expect($this->validator->validateName('J'))->toBeFalse();
});

it('validates emails correctly', function () {
    expect($this->validator->validateEmail('user@example.com'))->toBeTrue();
    expect($this->validator->validateEmail('userexample.com'))->toBeFalse();
    expect($this->validator->validateEmail(''))->toBeFalse();
});

it('validates passwords correctly', function () {
    expect($this->validator->validatePassword('12345678'))->toBeTrue();
    expect($this->validator->validatePassword('1234567'))->toBeFalse();
});

it('validates all inputs correctly', function () {
    $validResults = $this->validator->validateAll('John', 'john@example.com', 'password123');
    expect($validResults)->toMatchArray(['name' => true, 'email' => true, 'password' => true]);

    $invalidResults = $this->validator->validateAll('', 'bademail', '123');
    expect($invalidResults)->toMatchArray(['name' => false, 'email' => false, 'password' => false]);
});

it('validates email patterns correctly', function () {
    expect($this->validator->validateEmailPattern('user@example.com'))->toBeTrue();
    expect($this->validator->validateEmailPattern('userexample.com'))->toBeFalse();
    expect($this->validator->validateEmailPattern('user@.com'))->toBeFalse();
});

it('validates phone number patterns correctly', function () {
    expect($this->validator->validatePhoneNumberPattern('+1234567890'))->toBeTrue();
    expect($this->validator->validatePhoneNumberPattern('1234567890'))->toBeFalse();
    expect($this->validator->validatePhoneNumberPattern('+123'))->toBeFalse();
    expect($this->validator->validatePhoneNumberPattern('+1 234 567 890'))->toBeFalse(); // Assuming no spaces or other characters are allowed
});
