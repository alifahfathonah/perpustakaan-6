<?php
class Operator_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $username = $this->session->userdata('username');
        $level    = $this->session->userdata('level');
        $is_login = $this->session->userdata('login');

        if (!$is_login) {
            redirect("login/login_index");
            return;
        }
    }
}
