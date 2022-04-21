<?php

    class contact{
        private string $idContact;
        private string $fullName;
        private string $email;
        private string $subject;
        private string $content;
        private string $date;

        public function __construct($fullName, $email, $subject, $content, $date) {
            $this->idContact = "";
            $this->fullName = $fullName;
            $this->email = $email;
            $this->subject = $subject;
            $this->content = $content;
            $this->date = $date;
        }

        public function castToArray() {
            return [
                'idContact' => $this->idContact,
                'fullName' => $this->fullName,
                'email' => $this->email,
                'subjects' => $this->subject,
                'content' => $this->content,
                'dateContact' => $this->date
            ];
        }

        public function getIdContact() {
            return $this->idContact;
        }

        public function setSubject($subject) {
            $this->subject = $subject;
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function getContent() {
            return $this->content;
        }
        
    }

?>