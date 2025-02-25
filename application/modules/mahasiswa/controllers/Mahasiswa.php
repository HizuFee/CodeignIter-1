<?php
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->temp_css->useAsset()
            ->setCss(array('bootstrap', 'animate', 'font-awesome.min', 'icon', 'font', 'app', 'datatables', 'datepicker', 'materialPreloader.min'));

        $this->temp_js->useAsset()
            ->setJs(array('jquery.min', 'bootstrap', 'app', 'slimscroll/jquery.slimscroll.min', 'app.plugin', 'datatables/jquery.dataTables.min', 'validation/bootstrapValidator', 'datepicker/bootstrap-datepicker', 'bootbox/bootbox', 'materialPreloader.min', 'bootstrap-notify.min'));

        $this->load->database('default', TRUE);
        $this->slcdb = $this->db;
        $this->load->model('mahasiswa/mahasiswa_model');
    }

    function index()
    {
        $data['datatables'] = true;
        $data['title'] = $this->temp_css->getTitle();
        $data['temp_css'] = $this->temp_css->getMetadata();
        $data['temp_js'] = $this->temp_js->getMetadata();
        $data['content'] = 'mahasiswa/mahasiswa_view';
        $data['mahasiswa'] = $this->mahasiswa_model->get_all_mahasiswa();
        loadView('skin/header', $data);
        loadView('skin/footer', $data);
    }

    function tambah_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'alamat' => $alamat
        );

        $insert = $this->mahasiswa_model->tambah_mahasiswa($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data Mahasiswa berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan Data Mahasiswa');
        }

        redirect('mahasiswa');
    }
}
