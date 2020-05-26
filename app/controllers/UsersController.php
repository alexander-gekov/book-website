<?php

class UsersController extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->bookModel = $this->model('Book');
    }

    public function index()
    {
        $this->view('users/login');
    }

    public function login()
    {

        //POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                'email' => trim($_POST["email"]),
                'password' => trim($_POST["password"]),
                'email_err' => '',
                'password_err' => '',
            ];
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter username.";
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password.";
            }

            //Check for username
            if ($this->userModel->findUserByEmail($data['email'])) {
                //User found
            } else {
                $data['email_err'] = 'User not found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedUser) {
                    if (!$loggedUser->active) {
                        $data['email_err'] = 'Please wait for Admin to approve you.';
                        //Load Form
                        $this->view('/users/login', $data);
                    } else {
                        $this->createUserSession($loggedUser);
                    }
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('/users/login', $data);
                }
            } else {
                //Load form with errors
                $this->view('/users/login', $data);
            }
        } else {
            $data = ['email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',];

            //Load Form
            $this->view('/users/login', $data);
        }
    }

    public function register()
    {
//POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fname' => trim($_POST["fname"]),
                'lname' => trim($_POST["lname"]),
                'password' => trim($_POST["password"]),
                'email' => trim($_POST["email"]),
                'confirm_password' => trim($_POST["confirm_password"]),
                'fname_err' => '',
                'lname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            if (empty($data['fname'])) {
                $data['fname_err'] = "Please enter First Name.";
            }

            //Empty username or taken username
            if (empty($data['lname'])) {
                $data['lname_err'] = "Please enter Last Name.";
            }

            //EMail
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter an email.";
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already in use.';
                }
            }

            //Empty password or password less than 6
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter a password.";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must have at least 6 characters.";
            }


            //Empty confirm password or not matching
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password.";
            } else {
                if (($data['password'] != $data['confirm_password'])) {
                    $data['confirm_password_err'] = "Password did not match.";
                }
            }

            if (empty($data['fname_err']) && empty($data['lname_err']) && empty($data['email_err'])
                && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                //Password Hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register function
                if ($this->userModel->register($data)) {
                    //Redirect
                    redirect('users/login');
                } else {
                    die('Something went wrong.');
                }

            } else {
                //Load view with errors
                $this->view('/users/register', $data);
            }
        } else {
            $data = [
                'fname' => '',
                'lname' => '',
                'password' => '',
                'email' => '',
                'confirm_password' => '',
                'fname_err' => '',
                'lname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Load Form
            $this->view('/users/register', $data);
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function approve($id)
    {
        if (!isLoggedIn() || !isAdmin()) {
            redirect('books');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->approve($id)) {
                redirect('users/approve');
            } else {
                die('Something went wrong.');
            }
        }
    }

    public function profile($id){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $user = $this->userModel->getUserById($id);
        $data = [
            'user' => $user,
        ];

        $this->view('users/my_profile',$data);
    }

    public function show()
    {
        if (!isLoggedIn() || !isAdmin()) {
            redirect('books');
        }
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users,
        ];

        $this->view('users/approve', $data);
    }

    public function edit($id){
        if(!isLoggedIn()){
            return 'users/login';
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $this->userModel->getUserById($id);
            $data = [
                'id' => '',
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'pass' => $_POST['pass'],
            ];

            if($data['pass']==''){
                $data['pass'] = $user->password;
            }
            else{
                $data['pass'] = password_hash($data['pass'],PASSWORD_DEFAULT);
            }
            $data['id'] = $user->id;
            $_SESSION['user_name'] = $data['fname'];
            if($this->userModel->updateUser($data)){
                redirect('users/profile/' . $id);
            }
            else{
                die('Something went wrong.');
            }
        }
    }

    public function my_books()
    {
        if (!isLoggedIn()) {
            redirect('books');
        }
        $id = $_SESSION['user_id'];
        $my_books = $this->bookModel->getMyBooks($id);
        $data = [
            'my_books' => $my_books,
        ];

        $this->view('users/my_books', $data);
    }

<<<<<<< HEAD
    public function addToFavourites($book_id){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data=[
                'user_id' => $_SESSION['user_id'],
                'book_id' => $book_id,
=======
    public function recover()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $user = $this->userModel->getUserByEmail($email);
            $password = generateRandomString(6);

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'alexander.gekov00@gmail.com';                     // SMTP username
            $mail->Password   = 'eewgsbkbtwxvynjr';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('alexander.gekov00@gmail.com', 'Aleksandar');
            $mail->addAddress($user->email, $user->fname);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body    = 'Your new password is <b>' .$password. '</b>';
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            echo($password . $hashed_password);
            $this->userModel->reset($user->id, $hashed_password);
            flash('register_success', 'Password Reset Successfully.');
            redirect('users/login');
            $mail->send();
        } else {
            $data = [
                'email_err' => ''
>>>>>>> 01dede04be2fef3bde5adc0209b95be984810226
            ];
            if ($this->bookModel->addToFavourites($data)) {
                redirect('users/my_books');
            } else {
                die('Something went wrong.');
            }
        }
    }

    public function removeFromFavourites($book_id){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data=[
                'user_id' => $_SESSION['user_id'],
                'book_id' => $book_id,
            ];
            if ($this->bookModel->removeFromFavourites($data)) {
                redirect('users/my_books');
            } else {
                die('Something went wrong.');
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->fname;
        redirect('posts');
    }

}
