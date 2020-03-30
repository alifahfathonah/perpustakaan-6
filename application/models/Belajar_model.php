<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar_model extends MY_Model {

	public function getBook() {
        $query = $this->db->get( 'tb_book' );
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

	public function getMember() {
        $query = $this->db->get( 'tb_member' );
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function send($mobile,$message) {
        $request='username=username &pass=123456&senderid=Usersenderid&dest_mobileno='.$mobile.'&message='.$message.'&response=Y';
        $ch = curl_init('www.smsjust.com/blank/sms/user/urlsms.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        $resuponce=curl_exec($ch);
        curl_close($ch);
        return $resuponce;
    }
	
}