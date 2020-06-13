<?php
class MY_Controller extends CI_Controller
{
    protected $halaman = '';

    public function __construct()
    {
        parent::__construct();

        $model = strtolower(get_class($this));
        $modelVal = ucwords($model);
        $test = file_exists('./application/models/'. $modelVal .'_model.php');
        if (file_exists('./application/models/'. $modelVal .'_model.php')) {
            $this->load->model($modelVal.'_model', $model, true);
        }
     }
}