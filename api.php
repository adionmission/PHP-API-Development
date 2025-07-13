<?php

class API{
    private $connect = '';


    function __construct(){
        $this->dbConnection();
    }


    function dbConnection(){
        $this->connect = new PDO("mysql:host=localhost; dbname=assignment", "root", "");   // PDO is object 
    }


    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM courses INNER JOIN student_detail ON courses.course_id = student_detail.course_id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }


    function adddata(){
        $data= array(
        
            $first_name = array_key_exists('first_name', $_POST) ? $_POST['first_name'] : "",
            $last_name = array_key_exists('last_name', $_POST) ? $_POST['last_name'] : "",
            $course_name = array_key_exists('course_name', $_POST) ? $_POST['course_name'] : "",
            $date_of_joining = array_key_exists('date_of_joining', $_POST) ? $_POST['date_of_joining'] : ""

        );

        $sql = "

            INSERT INTO courses (course_name) VALUES ('{$course_name}');

            INSERT INTO student_detail (first_name, last_name, course_id, date_of_joining) VALUES ('{$first_name}', '{$last_name}', LAST_INSERT_ID(), '{$date_of_joining}');

        ";

        $insert = $this->connect->prepare($sql);
        $insert->execute($data);
    }


    function updatedata(){
        $data = array(
        
            $first_name = array_key_exists('first_name', $_POST) ? $_POST['first_name'] : "",
            $last_name = array_key_exists('last_name', $_POST) ? $_POST['last_name'] : "",
            $course_name = array_key_exists('course_name', $_POST) ? $_POST['course_name'] : "",
            $date_of_joining = array_key_exists('date_of_joining', $_POST) ? $_POST['date_of_joining'] : ""

        );

        $sql = "

            UPDATE courses SET course_name='{$course_name}' WHERE course_id=1;

            UPDATE student_detail SET first_name='{$first_name}' WHERE id=1;

            UPDATE student_detail SET last_name='{$last_name}' WHERE id=1;

            UPDATE student_detail SET date_of_joining='{$date_of_joining}' WHERE id=1;

        ";

        $insert = $this->connect->prepare($sql);
        $insert->execute($data);
    }


    function filterdata(){
        $sql = "

            SELECT * FROM courses INNER JOIN student_detail ON courses.course_id = student_detail.course_id WHERE first_name='Aditya' AND course_name='Python';

        ";

        $select = $this->connect->prepare($sql);
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

}

?>
