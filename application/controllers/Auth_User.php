<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Auth_model');

        // var_dump($this->session->all_userdata());die();

        // if ($this->session->userdata('id_admin')) {
        //     redirect('Admin_home');
        // } elseif ($this->session->userdata('id_role') == 1) {
        //     redirect('');
        // }
    }

    public function index()
    {
        $this->_login();
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('konsumen', [
            'username' => $username,
        ])->row_array();
        // ada user
        if ($user) {
            // jika aktif

            if ($user['status_aktif'] == 1) {

                //cek password
                if (password_verify($password, $user['password'])) {

                    // var_dump("ok");die();
                    $data = [
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'id_konsumen' => $user['id'],
                    ];

                    $this->session->set_userdata($data);

                    redirect('');
                } else {
                    $pesan = $this->alert('Maaf!', 'danger', "Password Salah!");
                    $this->session->set_flashdata('alert_auth', $pesan);

                    redirect('');
                }
            } else {

                $pesan = $this->alert('Maaf!', 'danger', "Email dengan Username tersebut belum aktif!");
                $this->session->set_flashdata('alert_auth', $pesan);

                redirect('');
            }
        } else {

            $pesan = $this->alert('Maaf!', 'danger', "Username belum terdaftar!");
            $this->session->set_flashdata('alert_auth', $pesan);

            redirect('');
        }
    }

    public function regist()
    {

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user_uname = $this->db->get_where('konsumen', [
            'username' => $username,
        ])->row_array();

        $user_email = $this->db->get_where('konsumen', [
            'email' => $email,
        ])->row_array();

        if ($user_uname || $user_email) {

            $pesan = $this->alert('Maaf!', 'danger', "Username atau email sudah terdaftar!");
            $this->session->set_flashdata('alert_auth', $pesan);

            redirect('');
        } else {

            $data = [
                'email' => htmlspecialchars($email),
                'username' => htmlspecialchars(strtolower($username)),
                'password' => password_hash($password, PASSWORD_DEFAULT),

            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];

            $this->db->insert('konsumen', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $pesan = $this->alert('Selamat!', 'success', "Akun anda sudah dibuat. Tolong aktivasi akun anda melalui email!");
            $this->session->set_flashdata('alert_auth', $pesan);

            redirect('');
        }
    }

    private function _sendEmail($token, $type)
    {

        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'geografilaboratorium@gmail.com',
            'smtp_pass' => 'GEOLABums22',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('admin_arealama@gmail.com', 'Admin Arealama');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktivasi akun anda : <a href="' . base_url() . 'auth_user/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        } else if ($type == 'forgot') {

            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk mengubah password akun anda : <a href="' . base_url() . 'auth_user/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('konsumen', [
            'email' => $email,
        ])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    $this->db->set('status_aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('konsumen');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('alert_auth', $this->alert('Congratulations!', 'success', ", $email is actived. Please Login"));
                    redirect('');
                } else {

                    $this->db->delete('konsumen', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('alert_auth', $this->alert('Sorry', 'danger', "Token expired!"));
                    redirect('');
                }
            } else {
                $this->session->set_flashdata('alert_auth', $this->alert('Sorry', 'danger', "Activation failed. Wrong token!"));
                redirect('');
            }
        } else {
            $this->session->set_flashdata('alert_auth', $this->alert('Sorry', 'danger', "Activation failed. Wrong email!"));
            redirect('');
        }
    }

    public function cari_email()
    {
        $email = $this->input->post('email');
        $user = $this->db->get_where('konsumen', ['email' => $email, 'status_aktif' => 1])->row_array();

        if ($user) {

            if ($user['status_aktif'] == 1) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('alert_auth', $this->alert('Congratulations!', 'success', 'Please check your email to reset your account password!'));
                redirect('');
            } else {
                $this->session->set_flashdata('alert_auth', $this->alert('Sorry', 'danger', 'Email not active'));
                redirect('');
            }
        } else {
            $this->session->set_flashdata('alert_auth', $this->alert('Sorry', 'danger', 'Email not registered'));
            redirect('');
        }
    }


    public function logout()
    {

        $this->session->sess_destroy();

        // $this->session->set_flashdata('message', $this->alert_dismiss('success', "Youre logout"));
        redirect('');
    }


    public function alert($kata_depan = "", $warna = "", $isi = "")
    {

        $alert = '<div class="alert alert-' . $warna . ' alert-dismissible fade show col-8 mb-2" role="alert" style="margin: auto;">
		<strong>' . $kata_depan . '</strong> ' . $isi . '
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  	</div>';

        return $alert;
    }
}