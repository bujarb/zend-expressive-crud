<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 18-10-11
 * Time: 11.15.MD
 */

namespace App\Form;

use Zend\Form\Form as ZendForm;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;

class UserForm extends ZendForm implements InputFilterProviderInterface
{
    public function __construct($name = null, array $options = [])
    {
        $name = isset($name) ? $name : 'user-form';
        parent::__construct($name, $options);

        $this->setAttribute('method', 'post')->setHydrator(new ClassMethods());

        $this->setAttribute('action','/user/add');
        $this->add([
            'name' => 'id',
            'type'  => 'hidden',
        ]);
        $this->add([
            'name' => 'name',
            'type'  => 'text',
            'options' => [
                'label' => 'Name',
            ],
            'attributes' => [
                'placeholder' => 'Name',
                'class' => 'form-control'
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => [
                'value' => 'Save',
                'class' => 'btn btn-info btn-block'
            ],
        ]);
    }
    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
//        $userValidator = new UserValidator();
//        return [
//            'username' => [
//                'required' => true,
//                'filters'  => [
//                    ['name' => 'Zend\Filter\StringTrim'],
//                ],
//                'validators' => [
//                    $userValidator->getValidator('username')
//                ]
//            ],
//            'email' => [
//                'required' => true,
//                'filters'  => [
//                    ['name' => 'Zend\Filter\StringTrim'],
//                ],
//                'validators' => [
//                    $userValidator->getValidator('email')
//                ],
//            ],
//        ];
    }
}