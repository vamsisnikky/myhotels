<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_hotel
 *
 * @author hb
 */
class Model_hotel  EXTENDS CI_Model{
    //put your code here
    
    public function special_offers(){
       return $this->db->get('special_offers')->result_array();
    }
    
    public function get_cities(){
       return $this->db->where('iStateId',12)->get('city_master')->result_array();
    }
    public function getnews(){
       return $this->db->get('news_events')->result_array();
    }
}

?>
