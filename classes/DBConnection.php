    <?php
    if (!defined('DB_SERVER')) {
        require_once("../initialize.php");
    }

    class DBConnection {
        // Declare properties with visibility keywords
        public $host = "localhost"; // Added visibility keyword and semicolon
        public $username = "root"; 
        public $password = ""; 
        public $database = "crm";        
        
        public $conn;
        
        public function __construct() {
            if (!isset($this->conn)) {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                
                // Check for connection error
                if ($this->conn->connect_error) {
                    echo 'Cannot connect to database server: ' . $this->conn->connect_error;
                    exit;
                }            
            }    
        }
        
        public function __destruct() {
            if ($this->conn) {
                $this->conn->close();
            }
        }
    }
    ?>
