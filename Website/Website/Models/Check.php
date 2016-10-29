<?php
class Check {
    private $_passed = true,
        $_errors = array(),
        $_db = null;

    //Constructs the Check Class. Used to check that a form can be submitted. Is correct.
    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Checks that the required part of the form is completed and submitted
    public function required($post, $type) {
        if(empty($post)) {
            $this->addError($type . " is required");
            $this->_passed = false;
        }
    }

    //Checks that two of the submitted forms are the same.
    public function matches($post1, $post2, $type) {
        if($post1 != $post2) {
            $this->addError($type . " must match");
            $this->_passed = false;
        }
    }

    //Checks that the submitted value is unique
    public function unique($post, $table, $type) {
        $unique = $this->_db->specificSQL("SELECT * FROM " . $table . " WHERE " . $type . " = '" . sanitize($post) . "'");
        if($unique->getCount() > 0) {
            $this->addError($type . " has been taken");
            $this->_passed = false;
        }
    }

    //Adds Strings(errors) to the error array to be displayed.
    private function addError($error) {
        $this->_errors[] = $error;
    }

    //Allows the errors to be displayed in a view.
    public function errors() {
        return $this->_errors;
    }

    //If one of the checks doesn't pass then this would be false and is used to check it.
    public function passed() {
        return $this->_passed;
    }
}
?>