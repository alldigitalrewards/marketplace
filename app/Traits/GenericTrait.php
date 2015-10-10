<?php
namespace App\Traits;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationExceptionInterface;

trait GenericTrait
{
    private $error = false;

    public function fetchValidationError()
    {
        if($this->error === false) {
            $this->error = 'Generic web error.';
        }

        return $this->error;
    }

    public function validateId($id, $name = 'ID')
    {
        $rules = v::int()->notEmpty()->setName($name);

        if($rules->validate($id)) {
            return true;
        }

        try {
            $rules->check($id);
        } catch(ValidationExceptionInterface $exception) {
            $this->error = $exception->getMainMessage();
        }

        return false;
    }
}
