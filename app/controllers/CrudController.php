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
         
    }
    function Welcome()
    {
        $this->call->view('Pet');
    }
    

//read
    function show(){      
         {       
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        $all = $this->PetModel->page($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('custom'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'pet/show?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('data', $data);
    }
    }

//create
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
               redirect('pet/show');
            }else{
                echo 'Hindi pumasok';
            }
        }else{
             $this->call->view('create');
        }       
    }

//update
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
                redirect('pet/show');
            }else{
                echo 'Hindi pumasok';
            }
        } 
        $this->call->view('update', $data);
    }

//hard delete
    public function delete($id){
        if($this->PetModel->delete($id)){
            redirect('/show');
        }else{
            echo 'Ulitin mo';
        }
    }

//soft delete
    public function softdelete($id){
        if($this->PetModel->soft_delete($id)){
            redirect('pet/show');
        }else{
            echo 'Ulitin mo';
        }
    }

//restoration
    function restore()
{
    $page = 1;
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $this->io->get('page');
    }

    $q = '';
    if (isset($_GET['q']) && !empty($_GET['q'])) {
        $q = trim($this->io->get('q'));
    }

    $records_per_page = 5;

    // Call a new model function for restore listing
    $all = $this->PetModel->restore_page($q, $records_per_page, $page);
    $data['pets'] = $all['records'];
    $total_rows = $all['total_rows'];

    $this->pagination->set_options([
        'first_link'     => '⏮ First',
        'last_link'      => 'Last ⏭',
        'next_link'      => 'Next →',
        'prev_link'      => '← Prev',
        'page_delimiter' => '&page='
    ]);
    $this->pagination->set_theme('custom'); // or 'tailwind'
    $this->pagination->initialize($total_rows, $records_per_page, $page, 'pet/restore?q='.$q);
    $data['page'] = $this->pagination->paginate();

    $this->call->view('restore', $data);
}

//restoring the deleted record
    function retrieve($id){
        if($this->PetModel->restore($id))
        {
            redirect('/pet/show');
        }else{
            echo'Error';
        }
    }
}