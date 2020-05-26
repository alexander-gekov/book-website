<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function register($data)
    {
        $sql = 'INSERT INTO users (fname,lname,email,password,active) VALUES (:fname, :lname,:email, :password, 0)';
        //Prepare
        $this->db->query($sql);
        //Bind
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function login($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        //Prepare
        $this->db->query($sql);
        //Bind
        $this->db->bind(':email', $email);
        //Execute
        $row = $this->db->single();


        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        }
        else {
            return false;
        }
    }

    public function approve($user_id)
    {
        $sql = 'UPDATE users SET active = 1 WHERE id = :id';
        //Prepare
        $this->db->query($sql);
        //Bind
        $this->db->bind(':id', $user_id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check if row is 1 or 0
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    public function getUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * FROM users';
        $this->db->query($sql);

        $result = $this->db->result();

        return $result;
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users WHERE active = 0';
        $this->db->query($sql);

        $result = $this->db->result();

        return $result;
    }

    public function updateUser($data){
        $sql = 'UPDATE users SET fname = :fname, lname = :lname, email = :email, password = :password WHERE id = :id';
        //Prepare
        $this->db->query($sql);
        //Bind

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['pass']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $sql = 'DELETE FROM users WHERE  id = :id';
        //Prepare
        $this->db->query($sql);
        //Bind

        $this->db->bind(':id', $id);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
