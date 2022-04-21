<?php
    include("connect.php");
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // error_reporting(1);
    
    class dataProcessor extends database {

        // Select data
        public function selectData($table, $whereCondition) {
            $array = [];
            $condition = "";
            foreach($whereCondition as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
                // echo "$key ";
            }
            $condition = substr($condition, 0, -4);
            $query = "SELECT * FROM ".$table." WHERE " . $condition;
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            mysqli_free_result($result);
            
            return $array;
        }

        // Select a table
        public function selectTable($table) {
            $array = [];
            $query = "SELECT * FROM ".$table."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            mysqli_free_result($result);
            return $array;
        }


        // Insert data
        public function insert($table, $data) {
            $query = "INSERT INTO ".$table." (";
            $query .= implode(",", array_keys($data)) .') VALUES (';
            $query .= "'" . implode("','", array_values($data)) ."');";
            $this->setQuery($query);
            $this->query();
            // echo "$query";
            // return $query;
        }

        

        // Update data
        public function update($table, $data, $whereCondition) {
            $dataUpdate = "";
            $condition = "";

            foreach($data as $key => $value) {
                $dataUpdate .= $key . " ='" . $value . "', ";
            }
            $dataUpdate = substr($dataUpdate, 0, -2);
            foreach($whereCondition as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -4);
            $query = "UPDATE " . $table . " SET " . $dataUpdate . " WHERE " . $condition . "";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            return true;
        }

        // Delete data
        public function delete($table, $whereCondition) {
            $condition = "";
            foreach($whereCondition as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -4);
            $query = "DELETE FROM ". $table ." WHERE ". $condition ."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            return true;
        }

        public function selectDataPagination($table, $page, $limit) {
            $array = [];
            $start = ($page -1) * $limit;
            $query = "SELECT * FROM ".$table." ORDER BY DESC LIMIT ".$start." ',' ".$limit."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            mysqli_free_result($result);
            return $array;
        }

        public function countPage($table, $page, $limit) {
            $query = "SELECT COUNT(id) AS id FROM ".$table."";
            $result = mysqli_query($this->_connection, $query);
            if(!$result){
                return NULL;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $total = $row[0]['id'];
            }
            mysqli_free_result($result);
            $pages = ceil($total / $limit);
            return $pages;
            
        }

        function runArray($array) {
            if(!empty($array)){
                foreach ($array as $key){
                    return $key;
                }
            }
        }

        public function checkLike($condition) {
            
            $result = $this->selectData("likes", $condition);
            $count = count($result);
            if($count == 0) {
                return false;
            }
            return true;
        }

        public function checkWishList($condition) {
            
            $result = $this->selectData("wishlist", $condition);
            $count = count($result);
            if($count == 0) {
                return false;
            }
            return true;
        }
        
        public function checkLogin($email, $password){
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $condition = [
                'email' => $email,
                'pass' => $password
            ];
            $result= $this->selectData('users', $condition);
            return $result;
        }

        public function checkAvailableEmail($email) {
            $condition = ['email' => $email];
            $result =  $this->selectData("users", $condition);
            $count = count($result);
            if($count == 0){
                return true;
            }
            return false;
        }

        public function checkConfirmPassword($password, $confirmPassword) {
            if($password == $confirmPassword) {
                return true;
            }
            return false;
        }


        public function processSendEmailRegister($email) {
            if ($this->checkAvailableEmail($email)) {
                $this->sendEmailRegister($email);
                echo "<script>alert('We have sent you an email. Please check it.');</script>";
            }
            else{
                echo "<script>alert('No');</script>";
            }
            
        }

        public function processSendEmailGetPassword($email) {
            if (!$this->checkAvailableEmail($email)) {
                $this->sendEmailGetPassword($email);
                echo "<script>alert('Check your email to get new password');</script>";
            }
            else {
                echo "<script>alert('Not found your email address');</script>";
            }
        }

        function getNewPass(){
            $pass = substr(md5(rand(0,999999)),0,8);
            return $pass;
        }

        public function sendEmailGetPassword($email){
            $newPass = $this->getNewPass();
            $mail = new PHPMailer(true);//true:enables exceptions
            try {
                $mail->SMTPDebug = 0; //0,1,2: chế độ debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'dennttinh@gmail.com'; // SMTP username
                $mail->Password = 'hothiden25102002';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('dennttinh@gmail.com', 'Ben Quik website' ); 
                $mail->addAddress($email); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Thư gửi lại mật khẩu';
                $noidungthu = "<p>Đây là mật khẩu mới '.$newPass'</p>"; 
                $mail->Body = $noidungthu;
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
            } catch (Exception $e) {
                echo 'Error: ', $mail->ErrorInfo;
            }
            $this->updateForgotPassword($email, $newPass);
        }

        public function sendEmailContact($email, $fullname, $subject, $content){
            $mail = new PHPMailer(true);
            try{
                $mail->SMTPDebug = 0; //0,1,2: chế độ debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'dennttinh@gmail.com'; // SMTP username
                $mail->Password = 'hothiden25102002';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($email, $fullname ); 
                $mail->addAddress('huy.nguyen23@student.passerellesnumeriques.org'); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = ("$email(Email Contact)");
                $noidungthu = "
                <strong>Fullname: </strong> $fullname<br/>
                <strong>Subject: </strong> $subject<br/>
                <strong>Message: </strong> $content<br/>";
                $mail->Body = $noidungthu;
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
            }
            catch(Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }
        }

        public function updateForgotPassword($email, $newPass) {
            $data = [
                "pass" => $newPass
            ];

            $condition = [
                "email" => $email
            ];

            $this->update("users", $data, $condition);
        }

        public function sendEmailRegister($email){
            $username = $_POST['userName'];
		    $password = $_POST['password'];
            $mail = new PHPMailer(true);//true:enables exceptions
            try {
                $mail->SMTPDebug = 0; //0,1,2: chế độ debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'linh.nguyenthikhanh02@gmail.com'; // SMTP username
                $mail->Password = 'Khanhlinh112002.';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('linh.nguyenthikhanh02@gmail.com', 'Du lịt cùng cu pé' ); 
                $mail->addAddress($email); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Verify your email';
                $mail->Body =  "<p>Hello $email</p><br>
                <p>Mình thấy bạn  $username  có hứng thú với việc đăng xuất khỏi trái Đất cùng Khánh Linh</p>
                <p style='color:red;'>Chúc bạn có mụt chiến du lịt vui vẻ *đá đít*</p>
                <p style='color:red;'>Đây là mật khẩu tài khoản \".$password\" đừng quyên mật khẩu để được đá đít nhìu lần nhé!</p>
                <button  style='color:yellow; background:black;'>Tin nhắn được gửi từ cu pé đáng iu nhứt hệ mặt trời</button>";
                //$mail->addAttachment('https://images.pexels.com/photos/1275393/pexels-photo-1275393.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'khanhlinh');
                // <p>You're receiving this email because you recently signed up for a Ben Quick account. 
                // To complete the signup process, hit the button below to verify your account.</p><br>
                // <a href='signin.php'><button>Verify email</button></a><br>
                // <p>If you didn't sign up for an account with us, please ignore this message :)</p>
                // <span>- Ben Quick Team</span>";
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
            } catch (Exception $e) {
                echo 'Error: ', $mail->ErrorInfo;
            }
        }
            
    }
    

    $test = new dataProcessor;

    // $test->renderData();
    // $test->renderComment(['idPhoto' => 1]);

?>