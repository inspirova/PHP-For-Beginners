<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('dummy'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function () {
    expect(Validator::string('dummy', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('dummy'))->toBeFalse();
    expect(Validator::email('dummy@example.com'))->toBeTrue();
});

it('validates that a number is greater than a given amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 100))->toBeFalse();
})->only();