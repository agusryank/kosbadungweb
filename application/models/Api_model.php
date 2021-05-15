<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function param($var){
        if(count($var,1)<=1){ 
            $r='call '.$var['n'].'()';
        } else {
            $s='';$r='';$i=0;
            $jml=count($var,1)-3;
            foreach ($var['v'] as $v => $a){
                if($i<$jml) {
                    $s=$s.'"'.$a.'",';
                } else {
                    $s=$s.'"'.$a.'"';
                }
                $i++;
            }
            $r='call '.$var['n'].' ('.$s.')';
        }
        return $r;
    }

    public function sp($var){
        $this->db->close();
        $this->db->initialize();
        return $this->db->query($this->param($var)); 
    }

}
