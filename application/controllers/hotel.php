<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class Hotel extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('model_hotel');
        $offers = $this->model_hotel->special_offers();
        $cities = $this->getcities();
        $news = $this->news();
        $gallery = $this->getHomeGallery();
        $this->load->view('templates/header');
        $this->load->view('pages/home', array('offers' => $offers, 'cities' => $cities, 'news' => $news, 'gallery' => $gallery));
        $this->load->view('templates/footer');
    }

    public function userlocation() {
        $tags = get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress=182.72.29.130');
        return $tags['city'];
    }

    public function getcities() {
        $this->load->model('model_hotel');
        return $this->model_hotel->get_cities();
    }

    public function login() {
        print_r($_POST);
    }

    public function forgotPassword() {
        print_r($_POST);
    }

    public function news() {
        $this->load->model('model_hotel');
        return $this->model_hotel->getnews();
    }

    public function getHomeGallery() {
        $this->load->model('model_hotel');
        return $this->model_hotel->home_gallery();
    }

    public function search() {
             $news = $this->news();
          
        if (isset($_POST['search']) && $_POST['search'] != NULL) {
            $data = $_POST;
            $checkin = strtotime($data['checkin']);
            $checkout = strtotime($data['checkout']);
            $datediff = $checkout - $checkin;
            $days = floor($datediff/(60*60*24));
            $data['total_days'] = $days;
            $this->load->model("model_hotel");
            $search_result   =  $this->model_hotel->search($data);
            $this->load->view('templates/header',array('search' => 'search'));
            $this->load->view('pages/check_availability',array('news' => $news,'result' =>$search_result));
            $this->load->view('templates/footer');
        }
    }
    
    public function view(){
       if(isset($_GET['iHotelId']) && $_GET['iHotelId'] != NULL){
           $iHotelId = $_GET[['iHotelId']];
            $this->load->model("model_hotel");
             $search_result   =  $this->model_hotel->view_detail($iHotelId);
       }
    }

}

?>
