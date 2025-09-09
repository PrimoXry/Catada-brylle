<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentController
 * 
 * Automatically generated via CLI.
 */
class StudentController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
    }

    public function get_all(){
        var_dump($this->StudentsModel->all());
    }

    public function create(){
        $data = array(
            'lname'=>'baldes',
            'fname'=> 'justin',
            'email'=> 'jus@gmail.com',
        );
        $this->StudentsModel->insert($data);
    }

    public function update(){
        $this->StudentsModel->update(4,[
            'lname'=>'Catada',
            'fname'=> 'Brylle Justin',
            'email'=> 'brycatada@gmail.com',
        ]);
    }

    public function delete(){
        $delete = 
        $this->StudentsModel->delete(3);
    }

    
}