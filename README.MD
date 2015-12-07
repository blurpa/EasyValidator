# EasyValidator

## Introduction

This is a variable validation library for PHP. It's easy to implement this to your existing application.

Current Rule Support List:
* Required (field is required)
* IP (valid ip format)
* Email (valid email format)
* MaxLength (max string length)
* MinLength (min string length)
* Number (input is a number)
* MinNumber (minimum number)
* MaxNumber (maximum number)
* Date (mm/dd/yyyy format)

The heart of the library uses the applyStop and applyRule methods. It's important to understand what the differences are.

If a rule being applied with applyStop() fails the validation, the remaining validation rules will not be run.
The most typical case where you would use applyStop instead of applyRule is when the input is a required field. There is
no reason to check if a string is max 15 characters or if the string is a valid email if the field is required.

NOTE: applyStop() only affects the current item being validated. It will not stop other variables from being verified.
This is by design so a visitor to your application can see all of the input errors at once.

## Example Usage

```php
$validator = new Blurpa\EasyValidator\Validator();

$email = 'ni@@c566565656565656565656656k.com';
$password ='1234567';
$ip = "127.0.0..1";


$validator->validate('email', $email)
    ->applyStop('Required')
    ->applyRule('Email')
    ->applyRule('MaxLength', 15);

$validator->validate('password', $password)
    ->applyStop('Required')
    ->applyRule('MinLength', 8);

$validator->validate('ip', $ip)
    ->applyRule('IP');

var_dump($validator->getValidationStatus());
var_dump($validator->getMessages());
```

### License

Easy Validator is licensed under the [MIT license](http://opensource.org/licenses/MIT)