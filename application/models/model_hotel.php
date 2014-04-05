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

    public function select_state($data) {
        return $this->db->where('iCountryId', $data)->get('state_master')->result_array();
    }

    public function select_city($data) {
        return $this->db->where('iStateId', $data)->get('city_master')->result_array();
    }

    public function getEmail($data) {
        return $this->db->where('vEmail', $data)->get('customers')->num_rows();
    }

    public function getnews() {
        return $this->db->get('news_events')->result_array();
    }

    public function home_gallery() {
        return $this->db->get('home_gallery')->result_array();
    }

    public function hotels($iHotelId) {
        $this->db->where('iHotelId', $iHotelId);
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

    public function get_room($iHotelRoomId) {
        $this->db->where(array('iHotelRoomId' => $iHotelRoomId));
        return $this->db->get('hotel_rooms')->result_array();
    }

    public function insert_customer($data) {
        $info = array(
            'vFirstName' => $data['vFirstName'],
            'vLastName' => $data['vLastName'],
            'vDob' => $data['vDob'],
            'vAddress1' => $data['vAddress1'],
            'vAddress2' => $data['vAddress2'],
            'iCountryId' => $data['iCountryId'],
            'iStateId' => $data['iStateId'],
            'iCityId' => $data['iCityId'],
            'iZip' => $data['iZip'],
            'vPhone' => $data['vPhone'],
            'vEmail' => $data['vEmail']
        );
        $this->db->insert('customers', $info);
        $count = $this->db->affected_rows();
        $customer_id = $this->db->insert_id();
        $this->db->select(array('A.* ,Cn.vCountryName, St.vStateName, Ct.vCityName'));
        $this->db->from('customers  A'); // I use aliasing make things joins easier
        $this->db->join('country_master AS Cn', 'A.iCountryId = Cn.iCountryId', 'INNER');
        $this->db->join('state_master AS St', 'A.iStateId = St.iStateId', 'INNER');
        $this->db->join('city_master AS Ct', 'A.iCityId = Ct.iCityId', 'INNER');
        $customer = $this->db->where('A.iCustomerId', $customer_id)->get()->result_array();
        return array('count' => $count, 'customer' => $customer);
    }
    
    public function set_password($id,$password){
        $data = array( 
            'vPassword' => $password
                );
         $this->db->where('iUserId', $id);
         $this->db->update('customers', $data);  
         echo $this->db->last_query();
         exit();
    }

}

?>
