<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailer extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function lupa_password()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'email@gmail.com',  // Email gmail
            'smtp_pass'   => 'passwordgmail',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@sikeplu.com', 'Sikeplu.com.com');

        // Email penerima
        $this->email->to('penerima@domain.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-smtp-gmail-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->session->set_flashdata('status','Reset sukses. Silahkan Cek email untuk instruksi lebih lanjut');
        } else {
            $this->session->set_flashdata('status','Reset sukses. Silahkan Cek email untuk instruksi lebih lanjut');
            // $this->session->set_flashdata('status','Reset gagal. Silahkan coba dengan email lainnya.');
        }
        redirect(base_url()."welcome");
    }
}