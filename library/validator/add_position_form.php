<?php
include 'validator_abstract.php';

class AddPositionForm extends ValidatorAbstract
{
    protected $fields = array(
        'name' => array(
            'required' => array(
                'message' => 'This field is required'
            )
        ),
        'experience' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        ),
        'salary' => array(
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
        )
    );
}

return new AddPositionForm();