<?php

namespace App\Traits;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationExceptionInterface;

trait ValidationTrait
{
    
//    public function validateUpdatePassword($user)
//    {
//        $rules = v::key('new_password', v::notEmpty()->length(7,33)->setName('New Password'))
//            ->key('confirm_new_password', v::notEmpty()->setName('New Password Confirmation'))
//            ->key('current_password', v::notEmpty()->setName('Current Password'));
//
//        if($rules->validate($user)) {
//
//            if ($user['confirm_new_password'] !== $user['new_password']) {
//                $this->error = 'The New Password fields do not match';
//                return false;
//            }
//
//            return true;
//        }
//
//        try {
//            $rules->check($user);
//        } catch(ValidationExceptionInterface $exception) {
//            $this->error = $exception->getMainMessage();
//        }
//
//        return false;
//    }

    public function validateAddress($address)
    {
        //@TODO: properly check all types.. strings need to be double checked for alnum, cause of typecasting.

        $rules = v::key('firstname', v::notEmpty()->setName('First name'))
            ->key('lastname', v::notEmpty()->setName('Last name'))
            ->key('address', v::alnum(".,-'")->notEmpty()->setName('Address'))
            ->key('secondary_address', v::when(v::notEmpty(), v::alnum(".,-'"), v::alwaysValid())->setName('Address 2'))
            ->key('city', v::alnum()->notEmpty()->setName('City'))
            ->key('state', v::alnum()->notEmpty()->setName('State'))
            ->key('zip', v::when(v::notEmpty(), v::postalCode('US'), v::alwaysValid())->notEmpty()->setName('Zipcode'));

        if($rules->validate($address)) {
            return true;
        }

        try {
            $rules->check($address);
        } catch(ValidationExceptionInterface $exception) {
//            $this->error = $exception->getMainMessage();
        }

        return false;
    }
}