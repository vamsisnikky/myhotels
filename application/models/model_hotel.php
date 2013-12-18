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
class Model_hotel EXTENDS CI_Model {

    //put your code here

    public function special_offers() {
        return $this->db->get('special_offers')->result_array();
    }

    public function get_cities() {
        return $this->db->where('iStateId', 12)->get('city_master')->result_array();
    }
    public function get_countries() {
        return $this->db->get('country_master')->result_array();
    }
    public function select_state($data)
    {
     return  $this->db->where('iCountryId',$data)->get('state_master')->result_array();
    }
    
    public function select_city($data){
        return  $this->db->where('iStateId',$data)->get('city_master')->result_array();
    }
    public function getnews() {
        return $this->db->get('news_events')->result_array();
    }

    public function home_gallery() {
        return $this->db->get('home_gallery')->result_array();
    }
    public function hotels($iHotelId){
        $this->db->where('iHotelId',$iHotelId);
        return $this->db->get('hotels')->result_array();
    }
    
    public function search($data) {
        $this->db->where(array('iCityId' => $data['iCity'], 'eStatus' => 'Active'));
        return $this->db->get('hotels')->result_array();
    }

    public function view_detail($HotelId) {
        $this->db->where(array('iHotelId' => $HotelId, 'iAvailableCount >' => 0));
        return $this->db->get('hotel_rooms')->result_array();
    }
    
    public function get_room($iHotelRoomId){
         $this->db->where(array('iHotelRoomId' => $iHotelRoomId));
        return $this->db->get('hotel_rooms')->result_array();
    }
    
    public function insert_customer($data){
        $info = array(
            'vFirstName'=>$data['vFirstName'],
            'vLastName' => $data['vLastName'],
            'vDob' => $data['vDob'],
            'vAddress1' => $data['vAddress1'],
            'vAddress2' => $data['vAddress2'],
            'iCountryId'=>$data['iCountryId'],
            'iStateId'=>$data['iStateId'],
            'iCityId'=>$data['iCityId'],
            'iZip'=>$data['iZip'],
            'vPhone'=>$data['vPhone'],
            'vEmail'=>$data['vEmail']
        );
        $this->db->insert('customers', $info); 
        echo $this->db->affected_rows();
        exit();
    }

}

?>
