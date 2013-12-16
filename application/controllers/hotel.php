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
        $this->load->view('templates/header');
        $this->load->view('pages/home', array('offers' => $offers,'cities' =>$cities,'news'=>$news));
        $this->load->view('templates/footer');
    }

    public function userlocation() {
        $tags = get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress=182.72.29.130');
        return $tags['city'];
    }

    public function getcities() {
        $this->load->model('model_hotel');
        return  $this->model_hotel->get_cities();
    }
    public function login(){
        print_r($_POST);
    }
    public function forgotPassword(){
         print_r($_POST);
    }
    
    public function news(){
          $this->load->model('model_hotel');
       return $this->model_hotel->getnews();
       
    }

}

?>
