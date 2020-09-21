<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Dashboard extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('model_sistem');
    }

    public function index(){
        $this->load->view('base'); 
    }

    public function insert_petugas()
    {
        $this->model_sistem->save_petugas();
    }

    public function insert_laporan()
    {
        $this->model_sistem->save_laporan();
    }

    public function delete_petugas()
    {
        $this->model_sistem->delete_officer();
    }

    public function update_petugas()
    {
        $this->model_sistem->update_officer();
    }

        public function delete_masyarakat()
        {
            $this->model_sistem->deletemasyarakat();
        }

        public function update_masyarakat()
        {
            $this->model_sistem->updatemasyarakat ();
        }

    

    public function login(){
        $this->load->view('masuk');

    }

    public function register(){
        $this->load->view('daftar');
    }

    public function tmplhome(){
        $this->load->view('Home.php');
    }

    public function simpan_data(){
        $this->model_sistem->simpan_db();
    }

    public function homeadmin(){
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $data['pengaduan'] = $this->model_sistem->get_pengaduan();
            $this->load->view('admin/home_admin', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function datamasyarakat() {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $data['masyarakat'] = $this->model_sistem->get_masyarakat();
            $this->load->view('admin/data_masyarakat', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function datapetugas() {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $data['petugas'] = $this->model_sistem->get_petugas();
            $this->load->view('admin/data_petugas', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function inputpetugas(){
       
            if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
                $this->load->view('admin/input_petugas');
            } else {
                header("Location:".base_url().'');
            }
      
    }

  
    

    public function logout(){
        $this->session->sess_destroy();
        redirect('');
    }


    function check_login(){
        $username = $this->input->post('Username');
        $password = $this->input->post('Password');

        $account = array(
            'Username' => $username,
            'Password' => $password
        );

        $check = $this->model_sistem->login_database($account)->num_rows();
        if ($check > 0) {
            $role = $this->model_sistem->login_database($account)->row(0)->level;
            if ($role == 'admin' || $role == 'petugas') {
                $current_role = $this->model_sistem->login_database($account)->row(0)->level;
                $current_id = $this->model_sistem->login_database($account)->row(0)->id_petugas;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => $current_role,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'dashboard/homeadmin');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            } else {
                $current_id = $this->model_sistem->login_database($account)->row(0)->nik;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => 'masyarakat',
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'dashboard/tmplhome');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            }
        } else {
            echo 'login gagal';
        }
    }


    public function print_pdf()
    {
        $data['petugas'] = $this->model_sistem->get_petugas();
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data.pdf";
		$this->pdf->load_view('admin/preview_admin', $data);
    }

    public function print_masyarakat()
    {
        $data['masyarakat'] = $this->model_sistem->get_masyarakat();
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data.pdf";
		$this->pdf->load_view('masyarakat/preview_masyarakat', $data);
    }

    public function print_xls()
    {
        $data = $this->model_sistem->get_petugas();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $this->session->userdata('username'));
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Name');
        $sheet->setCellValue('C3', 'Position');
        $sheet->setCellValue('D3', 'Username');
        $sheet->setCellValue('E3', 'Telephone');
        $x = 4;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $row->id_petugas);
				$sheet->setCellValue('B'.$x, $row->nama_petugas );
				$sheet->setCellValue('C'.$x, $row->level);
				$sheet->setCellValue('D'.$x, $row->username);
				$sheet->setCellValue('E'.$x, $row->telp);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-excel';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }

    public function print_masyarakatexcel()
    {
        $data = $this->model_sistem->get_masyarakat();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $this->session->userdata('username'));
        $sheet->setCellValue('A3', 'nik');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Username');
        $sheet->setCellValue('D3', 'Telepon');
        $x = 4;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $row->nik);
				$sheet->setCellValue('B'.$x, $row->nama);
				$sheet->setCellValue('C'.$x, $row->username);
				$sheet->setCellValue('D'.$x, $row->telp);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-excel';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }

    public function selesaiLaporan()
    {
        $this->model_sistem->selesaiLaporanModel();
    }

    
    public function tanggapan(){
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'masyarakat') {
            $data['report'] = $this->model_sistem->getLaporan();
            $this->load->view('masyarakat/tanggapan_masyarakat', $data);
        } else {
            header("Location:".base_url().'');
}
    }

    

}




?>