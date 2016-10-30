<?php
class User
{
    private $_db,
        $_data,
        $_sessionName = 'sessionInsid',
        $_isLoggedIn,
        $_cookieName = 'actInsid';

    //Sets up the user, setting up the database and finding the user.
    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();

        //Checks if a session is set for the user. In which the User will be logged in or logged out if the user is found.
        if(!$user) {
            if(isset($_SESSION[$this->_sessionName])) {
                $user = $_SESSION[$this->_sessionName];
                if($this->find($user)) {
                    $this->_isLoggedIn = true;

                } else {
                    $this->logout();
                }
            }
        } else {
            $this->find($user);
        }
    }

    //Creates the User Passing the SQL statement to DB to be queried.
    public function create($sql)
    {
        if (!$this->_db->insertSQL($sql)) {
            throw new Exception('There was a problem creating an account');
        }
    }

    //Find the User based on either there ID or email
    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->specificSQL("SELECT * FROM users WHERE " . $field . " = '" . $user . "'");
            if($data->getCount() > 0) {
                $this->_data = $data->getFirst();
                return true;
            }
        }
        return false;
    }

    //Logs the User in
    public function login($username = null, $password = null, $remember = false) {
            //Finds the User based on the username inputted
            $user = $this->find($username);
            if($user) {
                //Checks that the Password inputted is the same as the one stored in association to the user.
                if($this->data()->password === encrypt($password, $this->data()->salt)) {
                    //Creates the Session for the User
                    $_SESSION[$this->_sessionName] = $this->data()->id;
                    if($remember) {
                        //If the User selects to tbe remembered then a Cookie is set up. For when he returns to the site he'll be logged in.
                        $encryption = setUniqueID();
                        $encryptionCheck = $this->_db->specificSQL('SELECT * FROM sessions WHERE user_id = ' . $this->data()->id);
                        var_dump($encryptionCheck);
                        //Stores the Cookie details to the Session.
                        if(!$encryptionCheck->getCount()) {
                            $this->_db->insertSQL("INSERT INTO sessions (user_id, encryption) VALUES ('" . $this->data()->id . "','" . $encryption . "')");
                        } else {
                            $encryption = $encryptionCheck->getFirst()->encryption;
                        }
                        setcookie($this->_cookieName, $encryption, time()+604800);
                    }

                    return true;
                }
            }

        return false;

    }

    //Passes the Update SQL for the user to the DB to be queried.
    public function update($sql) {
        if(!$this->_db->update($sql)) {
            throw new Exception('There was a problem updating.');
        }
    }

    //Checks whether the user exists.
    public function exists() {
        return (!empty($this->_data) ? true : false);
    }

    //Logs the User out. Deleting the Cookie and Session
    public function logout() {
        //Removes the stores Encryption for the Session(Cookie)
        $sql = "DELETE FROM sessions WHERE user_id = " . $this->data()->id . "";
        $this->_db->delete($sql);

        unset($_SESSION[$this->_sessionName]);
        setcookie($this->_cookieName, time()-1);;
    }

    //Get's the Data for the User
    public function data() {
        return $this->_data;
    }

    //Gets whether the user is logged in
    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }

    //Gets the DB being used.
    public function getDB() {
        return $this->_db;
    }
}