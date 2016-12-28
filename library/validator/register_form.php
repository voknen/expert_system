<?php
include 'validator_abstract.php';

class RegisterForm extends ValidatorAbstract
{
    protected $fields = array(
        'firstname' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'lastname' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'email' => array(
            'required' => array(
                'message' => 'This field is required'
            )
        ),
        'password' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'role' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
    );
}

return new RegisterForm();