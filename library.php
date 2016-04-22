<?php

abstract class OutsideView {

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"mystyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Header</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>


            ";
    }

    public function bloggerList() {
        echo "
                 <div id=\"bloggerlist\">
                    <h3> blogger list </h3>
            </div>
            ";
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class InsideView {

    public function __construct() {
        $this->top();
        $this->menu();
        $this->content();
        $this->bloggerList();





        $this->bottom();
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> Add a post!!</h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">

                 
                        <input type=\"hidden\" name=\"cmd\" value=\"addPost\">
                        <textarea>
                        Add post here!
                        </textarea>

                            
        
                <input type=\"submit\"\ value=\"Add Post\">
            </FORM>
              
                
            </div>
            ";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Header</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=login\">Add</a> <br>               
                       <a href=\"controller.php?cmd=register\">Delete</a><br>
                       <a href=\"controller.php?cmd=register\">logout</a><br>
                       
            </div>


            ";
    }

    public function bloggerList() {
        echo "
                 <div id=\"bloggerlist\">
                    <h3> blogger list </h3>
            </div>
            ";
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

// splash screen view
class View1 extends OutsideView {

    public function __construct() {
        $this->top();
        $this->menu();
        $this->bloggerList();


        $this->content();


        $this->bottom();
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> Welcome to blogger.com </h1>
                  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                   blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  blah blah  
                
            </div>
            ";
    }

}

// register view    
class View4 extends OutsideView {

    public function __construct() {
        $this->top();
        $this->menu();
        $this->bloggerList();


        $this->content();


        $this->bottom();
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> Register </h1>
                  

                
            </div>
            ";
    }

}

// login view    
class View2 extends OutsideView {

    public function __construct() {
        $this->top();
        $this->menu();
        $this->bloggerList();


        $this->content();


        $this->bottom();
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> login </h1>
                   <FORM METHOD=\"post\" ACTION=\"controller.php\">

                 
                        <input type=\"hidden\" name=\"cmd\" value=\"loginRequest\">
                
                Username: <input type=\"text\" name=\"username\"> <br>
                Password: <input type=\"password\" name=\"password\"> <br>
                <input type=\"submit\"\ value=\"login\">
            </FORM>

                
            </div>
            ";
    }

}

class DBManager {

    private $db;

    public function __construct() {

        $address = 'mysql:host=localhost:3361;dbname=octoberquest';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO($address, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
        }
    }

    public function processLogin($username, $password) {

        // get the login details and query database


        $query = "select * from login";

        $resultSet = $this->db->query($query);

        while ($row = $resultSet->fetch()) {

            if (($row['username'] == $username) && ($row['password'] == $password)) {
                if ($username == "admin") {
                    return "admin";
                } else {
                    return "blogger";
                }
            }
        }

        return "invalid";
    }

}

?>
