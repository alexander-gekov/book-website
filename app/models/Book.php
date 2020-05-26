<?php

class Book
{
    private $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function addToFavourites($data){
        $this->db->query('INSERT INTO users_books (user_id, book_id) VALUES (:user_id, :book_id)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':book_id', $data['book_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function removeFromFavourites($data){
        $this->db->query('Delete from users_books where book_id = :book_id and user_id = :user_id');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':book_id', $data['book_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBooks()
    {
        $this->db->query('SELECT * FROM books');

        $results = $this->db->result();

        return $results;
    }

    public function getMyBooks($id){
        $this->db->query('SELECT * FROM books where books.id in (select book_id from users_books where user_id = :id)');
        $this->db->bind(':id', $id);

        $results = $this->db->result();

        return $results;
    }

    public function getBookById($id){
        $this->db->query('SELECT * FROM books WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }

    public function createBook($data){
        $sql = 'INSERT INTO books (name, isbn, description, image) VALUES (:book_name, :isbn, :description, :image)';
        //Prepare
        $this->db->query($sql);
        //Bind
        $this->db->bind(':book_name', $data['name']);
        $this->db->bind(':isbn', $data['isbn']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBook($data){
        $sql = 'UPDATE books SET name = :name, isbn = :isbn, description = :description, image = :image WHERE id = :id';
        //Prepare
        $this->db->query($sql);
        //Bind

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':isbn', $data['isbn']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBook($id){
        $sql = 'DELETE from books where id = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateImage($data)
    {
        $sql = 'UPDATE users SET img = :img WHERE id = :id';
        //Prepare
        $this->db->query($sql);
        //Bind

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':img', $data['img']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
