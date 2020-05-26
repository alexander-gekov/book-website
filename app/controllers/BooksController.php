<?php

class BooksController extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->bookModel = $this->model('Book');
    }

    public function index()
    {
        if (isLoggedIn()) {
            $books = $this->bookModel->getBooks();
            foreach ($books as $book) {
                if ($this->checkBook($book->id)) {
                    $book->added = true;
                } else {
                    $book->added = false;
                }
            }
            $data = [
                'books' => $books,
            ];
            $this->view('books/index', $data);
        } else {
            redirect('users/login');
        }
    }

    public function create()
    {
        if (isLoggedIn() && isAdmin()) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $fileName = $file['name'];
                    $fileType = $file['type'];
                    $fileTempName = $file['tmp_name'];
                    $fileError = $file['error'];
                    $fileSize = $file['size'];
                    $imageFullName = '';

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 20000000) {
                                $imageFullName = uniqid('', false) . '.' . $fileActualExt;
                                $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/book-website/public/img/' . $imageFullName;
                                move_uploaded_file($fileTempName, $fileDestination);
                            }
                        }

                    }
                }

                $data = [
                    'name' => trim($_POST["name"]),
                    'isbn' => trim($_POST["isbn"]),
                    'description' => trim($_POST["description"]),
                    'image' => 'default.jpg',
                    'name_err' => '',
                    'isbn_err' => '',
                    'description_err' => '',
                    'image_err' => '',
                ];


                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name.';
                }

                if (strlen($data['isbn']) > 12) {
                    $data['isbn_err'] = 'ISBN cannot be longer than 12 characters.';
                }

                if (empty($data['isbn'])) {
                    $data['isbn_err'] = 'Please enter ISBN.';
                }

                if (empty($data['description'])) {
                    $data['description_err'] = 'Please enter Description.';
                }

                if($fileName == ""){
                    $data['image_err'] = 'Please select image.';
                }

                if (empty($data['name_err']) && empty($data['isbn_err']) && empty($data['description_err']) && empty($data['image_err'])) {
                    $data['image'] = $imageFullName;
                    if ($this->bookModel->createBook($data)) {
                        redirect('books');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('books/create', $data);
                }
            } else {
                $data = [
                    'name' => '',
                    'isbn' => '',
                    'description' => '',
                    'image' => '',
                    'name_err' => '',
                    'isbn_err' => '',
                    'description_err' => '',
                    'image_err' => '',
                ];
                $this->view('books/create', $data);
            }
        }
    }

    public function show($book_id){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $book = $this->bookModel->getBookById($book_id);
        if ($this->checkBook($book->id)) {
            $book->added = true;
        } else {
            $book->added = false;
        }
        $data = [
            'book' => $book,
            ];

        $this->view('books/show',$data);
    }

    public function edit($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if (!isAdmin()) {
            redirect('books');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $_FILES['image'];
            $file = $_FILES['image'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileTempName = $file['tmp_name'];
            $fileError = $file['error'];
            $fileSize = $file['size'];
            $imageFullName = '';

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 20000000) {
                        $imageFullName = uniqid('', false) . '.' . $fileActualExt;
                        $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/book-website/public/img/' . $imageFullName;
                        move_uploaded_file($fileTempName, $fileDestination);
                    }
                }

            }

            $book = $this->bookModel->getBookById($id);

            $data = [
                'id' => $book->id,
                'name' => $_POST['name'],
                'isbn' => $_POST['isbn'],
                'description' => $_POST['description'],
                'image' => $book->image,
                'name_err' => '',
                'isbn_err' => '',
                'description_err' => '',
                'image_err' => '',
            ];
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name.';
            }

            if (strlen($data['isbn']) > 12) {
                $data['isbn_err'] = 'ISBN cannot be longer than 12 characters.';
            }

            if (empty($data['isbn'])) {
                $data['isbn_err'] = 'Please enter ISBN.';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter Description.';
            }


            if (empty($data['name_err']) && empty($data['isbn_err']) && empty($data['description_err'])) {
                if ($fileName != "") {
                    $data['image'] = $imageFullName;
                }
                if ($this->bookModel->updateBook($data)) {
                    redirect('books');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('books/edit', $data);
            }
        } else {
            $book = $this->bookModel->getBookById($id);
            //check for owner

            $data = [
                'id' => $book->id,
                'name' => $book->name,
                'isbn' => $book->isbn,
                'description' => $book->description,
                'image' => $book->image,
                'name_err' => '',
                'isbn_err' => '',
                'description_err' => '',
                'image_err' => '',
            ];

            $this->view("books/edit", $data);
        }
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if (!isAdmin()) {
            redirect('books');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->bookModel->deleteBook($id)) {
                redirect('books');
            } else {
                die('Something went wrong.');
            }
        } else {
            redirect('books');
        }


    }

    public function checkBook($id)
    {
        if(!isLoggedIn()){
            return 'users/login';
        }
        $my_books = $this->bookModel->getMyBooks($_SESSION['user_id']);
        foreach ($my_books as $book) {
            if ($book->id == $id) {
                return true;
            }
        }
        return false;
    }
}
