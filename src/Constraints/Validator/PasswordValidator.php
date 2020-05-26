<?php
namespace App\Constraints\Validator;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class PasswordValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $letterFind=0;
        $numberFind =0;
        $mdp[] = str_split($value);
        foreach ($mdp as $letter){
            if(is_numeric( $letter)) {
                $numberFind += 1;
            }

        }
        if( $numberFind>=1){
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}