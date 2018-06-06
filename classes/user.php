<?php
class user {
  private $_db,
          $_data,
          $_sessionName,
          $_loggedIn;

  public function __construct ($user = null) {
    $this->_db = db::getInstance ();
    $this->_sessionName = config::get ('session/session_name');

    if (!$user) {
      if (session::exists ($this->_sessionName)) {
        $user = session::get ($this->_sessionName);

        if ($this->find ($user)) {
          $this->_loggedIn = true;
        } else {
          # Log out
        }
      }
    } else {
      $this->find ($user);
    }
  }

  public function create ($fields = array ()) {
    if (!$this->_db->insert ('users', $fields)) {
      throw new Exception ('An error has occurred');
    }
  }

  public function find ($user = null) {
    if ($user) {
      $field = (is_numeric ($user)) ? 'id' : 'username';
      $data = $this->_db->get ('users', array ($field, '=', $user));

      if ($data->count ()) {
        $this->_data = $data->first ();
        return true;
      }
    }

    return false;
  }

  public function login ($username = null, $password = null) {
    $user = $this->find ($username);

    if ($user) {
      if ($this->data ()->password == hash::make ($password, $this->data()->salt)) {
        session::put ($this->_sessionName, $this->data ()->id);
        return true;
      }
    }

    return false;
  }

  public function logout () {
    session::delete ($this->_sessionName);
  }

  public function data () {
    return $this->_data;
  }

  public function loggedIn () {
    return $this->_loggedIn;
  }
}
