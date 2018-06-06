<?php
class validate {
  private $_past = false,
          $_db = null;

  public $_errors = array ();

  public function __construct () {
    $this->_db = db::getInstance ();
  }

  public function check ($source, $items = array ()) {  # Source = POST or GET | Items = array ()
    foreach ($items as $item => $rules) {               # Items = 'firstname', 'lastname', etc. | Rules = array ()
      foreach ($rules as $rule => $rule_value) {        # Rule = 'required', 'min', etc. | Rule Value = => ...
        $value = $source [$item];

        # Set the item name
        if ($rule == 'name') {
          $name = $rule_value;
        }

        if ($rule == 'required' && empty ($value)) {
          $this->addError ($item, "{$name} is required");
        } else if (!empty ($value)) {
          switch ($rule) {
            case 'min':
              if (strlen ($value) < $rule_value) {
                $this->addError ($item, "{$name} must be a minimum of {$rule_value} characters");
              }
            break;

            case 'max':
              if (strlen ($value) > $rule_value) {
                $this->addError ($item, "{$name} must be a maximum of {$rule_value} characters");
              }
            break;

            case 'matches':
              if ($value != $source [$rule_value]) {
                $this->addError ($item, "{$name} must match {$rule_value}");
              }
            break;

            case 'unique':
              $check = $this->_db->get ($rule_value, array ($item, '=', $value));
              if ($check->count ()) {
                  $this->addError ($item, "{$name} is taken");
              }
            break;
          }
        }
      }
    }

    if (empty ($this->errors ())) {
      $this->_passed = true;
    }

    return $this;
  }

  private function addError ($item, $error) {
    $this->_errors [$item] = $error;
  }

  public function errors () {
    return $this->_errors;
  }

  public function passed () {
    return $this->_passed;
  }
}
