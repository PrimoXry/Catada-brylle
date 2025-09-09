<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: CrudController
 * 
 * Automatically generated via CLI.
 */
class CrudController extends Controller {
    public function __construct()
    {
        parent::__construct();
         
        $this->call->model('PetModel');
    }
    public function pet($name, $type, $age){
        $data['name'] =$name;
         $data['type'] =$type;
          $data['age'] =$age;
          $this->call->view('Pet', $data);
    }

    function show1(){
        $this->call->database();
        if($this->db){
            echo 'sige';
        }else{
            echo 'wag';
        }
    }

    function show(){      
        $data ['user'] = $this->PetModel->all();
        $this->call->view('data', $data);
    }

    public function create(){
        if($this->io->method() =='post'){
            $name = $this->io->post('name');
            $type = $this->io->post('type');
            $age = $this->io->post('age');
            $data = array(
                'name' => $name,    
                'type' => $type,
                'age' => $age       
            );
            if($this->PetModel->insert($data)){
               redirect('/testdb');
            }else{
                echo 'Hindi pumasok';
            }
        }else{
             $this->call->view('create');
        }       
    }

    public function update($id){
        $data['pet'] = $this->PetModel->find($id);
        if($this->io->method() =='post'){
            $name = $this->io->post('name');
            $type = $this->io->post('type');
            $age = $this->io->post('age');
            $data = array(
                'name' => $name,    
                'type' => $type,
                'age' => $age       
            );
            if($this->PetModel->update($id, $data)) {
                redirect('/testdb');
            }else{
                echo 'Hindi pumasok';
            }
        } 
        $this->call->view('update', $data);
    }

    public function delete($id){
        if($this->PetModel->delete($id)){
            redirect('/testdb');
        }else{
            echo 'Ulitin mo';
        }
    }

    public function softdelete($id){
        if($this->PetModel->soft_delete($id)){
            redirect('/testdb');
        }else{
            echo 'Ulitin mo';
        }
    }

    public function restore($id){
        if($this->PetModel->restore($id)){
            redirect('/testdb');
        }else{
            echo 'Ulitin mo';
        }
    }
}