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
            if (!$this->checkAvailableEmail($email)) {
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
                $mail->SMTPDebug = 0; //0,1,2: ch??? ????? debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'benq15420@gmail.com'; // SMTP username
                $mail->Password = 'ftxavrbvbcyvffmk';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('benq15420@gmail.com', 'Ben Quik website' ); 
                $mail->addAddress($email); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Ch??ng t??i ???? kh??i ph???c th??nh c??ng t??i kho???n c???a b???n';
                $noidungthu = "<p>Ch??o m???ng b???n ???? quay tr??? l???i t??i kho???n c???a m??nh. </p>";
                $noidungthu .= "<p>????y l?? t??i m???t kh???u m???i c???a b???n: '$newPass'</p>";
                $noidungthu .= "<p>N???u c?? b???t k??? th???c m???c n??o vui l??ng li??n h??? v???i ch??ng t??i qua email n??y nh??!</p>" ;
                $noidungthu .= "<p>Ch??c b???n m???t ng??y t???t l??nh.</p>";
                $mail->Body = $noidungthu;
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
            $this->updateForgotPassword($email, $newPass);
        }

        public function sendEmailContact($email, $fullname, $subject, $content){
            $mail = new PHPMailer(true);
            try{
                $mail->SMTPDebug = 0; //0,1,2: ch??? ????? debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'benq15420@gmail.com'; // SMTP username
                $mail->Password = 'ftxavrbvbcyvffmk';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($email, $fullname ); 
                $mail->addAddress('benq15420@gmail.com', 'Ben Quik website' ); 
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
                echo 'Mail kh??ng g???i ???????c. L???i: ', $mail->ErrorInfo;
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
                $mail->SMTPDebug = 0; //0,1,2: ch??? ????? debug
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'benq15420@gmail.com'; // SMTP username
                $mail->Password = 'ftxavrbvbcyvffmk';   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom('linh.nguyenthikhanh02@gmail.com', 'Ben Quik website' ); 
                $mail->addAddress($email); 
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Verify your email';
                $mail->Body =  "<p>Ch??o m???ng b???n ?????n v???i Graphicprose.</p><br>
                <p>R???t vui khi g???p b???n $username ???? ?????n v???i NEW Stories c???a ch??ng t??i.</p>
                <p>Gi??? ????y b???n ???? tr??? th??nh m???t th??nh vi??n c???a gia ????nh Graphicprose.</p>
                <p>????y l?? t???t c??? c??c th??ng tin m?? b???n ???? ????ng k?? t??i kho???n t???i Graphicprose:</p>
                <p style='color:red;'>T??n t??i kho???n: $username.</p>
                <p style='color:red;'>M???t kh???u: $password.</p>
                <p>Gi??? ????y b???n ???? s??? h???u cho m??nh m???t t??i kho???n d??nh ri??ng cho Graphicprose.</p>
                <p>Ch??c b???n c?? nh???ng tr???i nghi???m th???t th?? v??? t???i Graphicprose c???a ch??ng t??i.</p>
                ";
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
    
?>