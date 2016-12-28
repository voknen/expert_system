<?php
include 'validator_abstract.php';

class AddCompanyForm extends ValidatorAbstract
{
    protected $fields = array(
        'name' => array(
            'required' => array(
                'message' => 'This field is required'
            )
        ),
        'address' => array(
            'required' => array(
                'message' => 'This field is required'
            ),
        )
    );
}

return new AddCompanyForm();