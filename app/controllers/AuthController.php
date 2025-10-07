<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function register()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');
            $confirm_password = $this->io->post('confirm_password');
            $role = $this->io->post('role') ?? 'user';

            if ($this->auth->register($username, $password, $confirm_password, $role)) {
                redirect('/auth/login');
                return;
            } else {
                $data['errors'] = $this->auth->get_register_errors();
                $this->call->view('auth/register', $data);
                return;
            }
        }

        $this->call->view('auth/register');
    }

    public function login()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');

            if ($this->auth->login($username, $password)) {
                if ($this->auth->has_role('admin')) {
                    redirect('/pet/show'); // Admin dashboard
                } else {
                    redirect('/auth/dashboard'); // User dashboard
                }
                return;
            } else {
                $data['errors'] = $this->auth->get_login_errors();
                $this->call->view('auth/login', $data);
                return;
            }
        }

        $this->call->view('auth/login');
    }

    public function dashboard()
    {
        $this->call->library('auth');

        if (!$this->auth->is_logged_in()) {
            redirect('/auth/login');
        }

        $role = $_SESSION['role'] ?? 'user';

        if ($role === 'admin') {
            redirect('/pet/show');
        }

        // For regular users: load read-only user list
        $this->call->model('PetModel');

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
        $data['user'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('custom'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'auth/dashboard?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('auth/dashboard', $data);
    }

    public function logout()
    {
        $this->call->library('auth');

        // Logout user
        $this->auth->logout();

        // Redirect to login page (not register)
        redirect('/auth/login');
    }
}
