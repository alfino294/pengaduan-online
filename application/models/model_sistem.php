<?php 

    class model_sistem extends CI_model{

        public function simpan_db(){
            $data = array (
                'nik' => "",
                'nama' => $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password'),
                'telp'  => $this->input->post('telp'),

            );
            $this->db->insert('masyarakat', $data);
            header("Location:".base_url().'Dashboard/login');
            
        }
        public function get_user()
        {
           $data = $this->db->get('masyarakat');
           return $data->result();
        }

        public function count_user()
        {
           $data =  $this->db->get('masyarakat');
           return $data->nums_rows();
        }

        public function login_database($account)
        {
            $petugas = $this->db->get_where('Petugas',$account);
            $masyarakat = $this->db->get_where('masyarakat',$account);
            if ($petugas->result() == null) {
                return $masyarakat;
            }else{
                return $petugas;
            }
            
        }

        public function get_pengaduan()
        {
            $data = $this->db->get('pengaduan');
            return $data->result();
        }

        public function save_petugas()
        {
            $data = array(
                'nama_petugas' => $this->input->post('nama_officer'),
                'username' => $this->input->post('username_officer'),
                'password' => $this->input->post('password_officer'),
                'telp' => $this->input->post('telepon_officer'),
                'level' => $this->input->post('position_officer'),
            );
    
            $this->db->insert('Petugas', $data);
            header("Location:".base_url().'dashboard/inputpetugas');
        }

        public function save_laporan()
        {
            $data = array(
                'tgl_pengaduan' => $this->input->post('tanggal'),
                'nik' => $this->input->post('nik_adu'),
                'isi_laporan' => $this->input->post('isi'),
                'foto' => $this->input->post('file'),
                'status' => $this->input->post('status_adu'),
               
            );
    
            $this->db->insert('pengaduan', $data);
            header("Location:".base_url().'dashboard/tmplhome');
        }

        public function delete_officer()
        {
            $data = array(
                'id_petugas' => $this->input->post('petugas_id')
            );
    
            $this->db->delete('Petugas', $data);
            header("Location:".base_url().'dashboard/datapetugas');
        }
    
        public function update_officer()
        {
            $data = array(
                'nama_petugas' => $this->input->post('name_officer'),
                'username' => $this->input->post('username_officer'),
                'password' => $this->input->post('password_officer'),
                'telp' => $this->input->post('telepon_officer'),
                'level' => $this->input->post('position_officer'),
            );
    
            $where = array('id_petugas' => $this->input->post('id_officer'),);
    
            $this->db->update('Petugas', $data, $where);
            header("Location:".base_url().'dashboard/datapetugas');
        }

        public function get_petugas()
        {
            $data = $this->db->get('Petugas');
            return $data->result();
        }


        public function get_masyarakat()
        {
            $data = $this->db->get('masyarakat');
            return $data->result();
        }
       
        public function deletemasyarakat()
        {
            $data = array(
                'nik' => $this->input->post('nik_user')
            );
    
            $this->db->delete('masyarakat', $data);
            header("Location:".base_url().'dashboard/datamasyarakat');
        }
    
        public function updatemasyarakat()
        {
            $data = array(
                'nik' => $this->input->post('nik_user'),
                'nama' => $this->input->post('nama_user'),
                'username' => $this->input->post('username_user'),
                'password' => $this->input->post('password_user'),
                'telp' => $this->input->post('telp_user'),
            );
    
            $where = array('nik' => $this->input->post('nik_user'),);
    
            $this->db->update('masyarakat', $data, $where);
            header("Location:".base_url().'dashboard/datamasyarakat');
        }

        public function selesaiLaporanModel()
        {
            $data = array(
                'id_pengaduan' => $this->input->post('id_aduan'),
                'tanggapan' => $this->input->post('tanggapan_pengaduan'),
                'id_petugas' => $this->session->userdata('id'),
            );
    
            $data_update = array(
                'status' => 'selesai',
            );
    
            $where = array(
                'id_pengaduan' => $this->input->post('id_aduan'),
            );
    
            $this->db->set('tgl_tanggapan','NOW()',FALSE);
    
            $this->db->insert('tanggapan', $data);
            $this->db->update('pengaduan', $data_update, $where);
            header("Location:".base_url().'dashboard/homeadmin');
        }

        public function getLaporan()
        {
            $data = $this->db->get('pengaduan');
            return $data->result();
        }
    

      
    
        
    }
       
    

?>