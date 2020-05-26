<?php
namespace App\Constraints\Validator;
use Symfony\Component\Validator\Constraint;
/**
 *
 * @Annotation
 */
class Password extends Constraint
{
    public $message = 'Le mot de passe doit contenir min 1chiffre et 1 lettre';
    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}
?>