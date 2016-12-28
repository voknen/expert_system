<?php
include 'validator_abstract.php';

class UserDataForm extends ValidatorAbstract
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
        'salary' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'experience' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'languages' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'technologies' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'ides' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
    );
}

return new UserDataForm();