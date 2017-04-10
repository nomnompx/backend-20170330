<?php
/**
* table: users
*/
class UserModel extends Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get user data
     * @param  string $key      username or email
     * @param  string $value 
     * @return array            user info
     */
    public function get_user($key_name, $value)
    {
        return $this->fetch_one_row('users', $key_name, $value);
    }

    public function get_all_user($paged = 1, $limit = 12)
    {
        return $this->fetch_all('users', $paged, $limit);
    }

    /**
     * 
     * @param  array    $info   array('column' => 'value')
     * @return int              number of rows
     */
    public function create_user($username, $email, $birthdate, $password, $role = 0)
    {
        /*$info = array(
            'name' => $username,
            'email' => $email,
            'birthdate' => $birthdate,
            'password' => sha1($password),
            'role' => $role
            );*/
        $info = array(
            'name' => array('type' => 'string', 'value' => $username),
            'email' => array('type' => 'string', 'value' => $email),
            'birthdate' => array('type' => 'string', 'value' => $birthdate),
            'password' => array('type' => 'string', 'value' => sha1($password)),
            'role' => array('type' => 'int', 'value' => $role),
            );
        $stmt = $this->insert('users', $info);
        return $stmt->rowCount();
    }
}
?>