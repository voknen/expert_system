<?php
include 'validator_abstract.php';

class LoginForm extends ValidatorAbstract
{
    protected $fields = array(
        'email' => array(
            'required' => array(
                'message' => 'This field is required'
            )
        ),
        'password' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        )
    );
}

return new LoginForm();