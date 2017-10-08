<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function index()
	{
		$this->load->view('chat');
	}

	public function kirim_chat()
    {
        $user=$this->input->post("user");
        $pesan=$this->input->post("pesan");
         
        mysql_query("insert into chat (user,pesan) VALUES ('$user','$pesan')");
        redirect ("C_chat/ambil_pesan");
    }
     
    public function ambil_pesan()
    {
        $tampil=mysql_query("select * from chat order by waktu desc");
        while($r=mysql_fetch_array($tampil)){
        echo "<li><b>$r[user]</b> : $r[pesan] (<i>$r[waktu]</i>)</li>";
        }
    }
}
