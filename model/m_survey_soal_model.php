<?php 
class SurveySoal{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct(){
        include('koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) values(?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('iiiss', $data['survey_id'], $data['kategori_id'],$data['no_urut'], $data['soal_jenis'], $data['soal_nama']);
        
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData(){
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where soal_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data){
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set survey_id = ?, kategori_id = ?, no_urut = ?, soal_jenis = ?, soal_nama = ? where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('iiissi', $data['survey_id'], $data['kategori_id'],$data['no_urut'], $data['soal_jenis'], $data['soal_nama'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }

    public function getQuestionTypeRating() {
        $query = $this->db->prepare("select * from {$this->table} where soal_jenis = 'rating'");
        $query->execute();
        return $query->get_result();
    }

    public function getQuestionToMahasiswa() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'mahasiswa'");
        $query->execute();
        return $query->get_result();
    }
    
    public function getQuestionToDosen() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'dosen'");
        $query->execute();
        return $query->get_result();
    }

    public function getQuestionToTendik() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'tendik'");
        $query->execute();
        return $query->get_result();
    }

    public function getQuestionToOrtu() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'ortu'");
        $query->execute();
        return $query->get_result();
    }

    public function getQuestionToAlumni() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'alumni'");
        $query->execute();
        return $query->get_result();
    }

    public function getQuestionToIndusti() {
        $query = $this->db->prepare("select soal.* from {$this->table} as soal join m_survey as survey on soal.survey_id=survey.survey_id where survey.survey_jenis = 'industri'");
        $query->execute();
        return $query->get_result();
    }

}