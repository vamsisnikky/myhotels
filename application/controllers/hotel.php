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
        $this->session->sess_destroy();
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

    public function getcountries() {
        $this->load->model('model_hotel');
        return $this->model_hotel->get_countries();
    }

    public function findState() {
        $this->load->model('model_hotel');
        $states = $this->model_hotel->select_state($_GET['country']);
        foreach ($states as $state) {
            echo "<option value='" . $state['iStateId'] . "'>" . $state['vStateName'] . "</option>";
        }
    }

    public function findCity() {
        $this->load->model('model_hotel');
        $cities = $this->model_hotel->select_city($_GET['state']);
        foreach ($cities as $city) {
            echo "<option value='" . $city['iCityId'] . "'>" . $city['vCityName'] . "</option>";
        }
    }

    public function checkEmail() {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (isset($_POST) && $_POST['vEmail'] != NULL && preg_match($regex, $_POST['vEmail'])) {
            $vEmail = $_POST['vEmail'];
            $this->load->model('model_hotel');
            $email_count = $this->model_hotel->getEmail($vEmail);
            if ($email_count == 0) {
                echo '<img width = "15" height = "15" src="http://localhost/myhotels/assets/images/tick.jpg"> <strong class="green"> ' . $vEmail . '</strong> is Available';
            } else {
                echo '<img width = "15" height = "15" src="http://localhost/myhotels/assets/images/cross.png"> <strong class="red"> ' . $vEmail . '</strong> is already used, you can login this email <a class="loginlink" href="#login" >Login</a>';
            }
        }
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
            $days = floor($datediff / (60 * 60 * 24));
            if ($days == 0) {
                $days = 1;
            }
            $data['total_days'] = $days;
            $this->session->set_userdata($data);
            $this->load->model("model_hotel");
            $search_result = $this->model_hotel->search($data);
            $this->load->view('templates/header', array('search' => 'search'));
            $this->load->view('pages/check_availability', array('news' => $news, 'result' => $search_result));
            $this->load->view('templates/footer');
        }
    }

    public function view() {
        if (isset($_GET['iHotelId']) && $_GET['iHotelId'] != NULL) {
            $iHotelId = $_GET['iHotelId'];
            $news = $this->news();
            $book_details = $this->session_details();
            $search_result = $this->model_hotel->view_detail($iHotelId);
            $hotel_result = $this->model_hotel->hotels($iHotelId);
            $this->load->view('templates/header', array('search' => 'room'));
            $this->load->view('pages/available_rooms', array('news' => $news, 'result' => $search_result, 'details' => $book_details, 'hotel' => $hotel_result));
            $this->load->view('templates/footer');
        }
    }

    public function book() {
        if (isset($_GET['iHotelRoomId']) && $_GET['iHotelRoomId'] != NULL) {
            $iHotelRoomId = $_GET['iHotelRoomId'];
            $news = $this->news();
            $book_details = $this->session_details();
            $search_result = $this->model_hotel->get_room($iHotelRoomId);
            $this->session->set_userdata('room_price', $search_result[0]['fDiscountedPrice']);
            $iHotelId = $search_result[0]['iHotelId'];
            $hotel_result = $this->model_hotel->hotels($iHotelId);
            $this->load->view('templates/header', array('search' => 'book'));
            $this->load->view('pages/selected_room', array('news' => $news, 'result' => $search_result, 'hotel' => $hotel_result, 'details' => $book_details));
            $this->load->view('templates/footer');
        }
    }

    public function session_details() {
        $details = $this->session->all_userdata();
//        echo '<pre>';
//        print_r($details);
        $checkin = explode('-', $details['checkin']);
        $checkout = explode('-', $details['checkout']);
        $checkin_year = $checkin[0];
        $checkin_month = date("F", mktime(0, 0, 0, $checkin[1], 10));
        $checkin_day = $checkin[2];
        $checkout_year = $checkout[0];
        $checkout_month = date("F", mktime(0, 0, 0, $checkout[1], 10));
        $checkout_day = $checkout[2];
        $totalnights = $details['total_days'];
        $book_details = array('checkin_day' => $checkin_day,
            'checkin_month' => $checkin_month,
            'checkin_year' => $checkin_year,
            'checkout_day' => $checkout_day,
            'checkout_month' => $checkout_month,
            'checkout_year' => $checkout_year,
            'total_nights' => $totalnights,
            'total_adult' => $details['iAdult'],
            'total_child' => $details['iChild']
        );
        return $book_details;
    }

    public function booking_details() {
        $news = $this->news();
        $countries = $this->getcountries();
        $book_details = $this->session->all_userdata();
        $captcha = $this->captcha();
        $this->load->view('templates/header', array('search' => 'book'));
        $this->load->view('pages/booking_detail', array('news' => $news, 'countries' => $countries, 'details' => $book_details, 'captcha' => $captcha));
        $this->load->view('templates/footer');
    }

    public function captcha() {
        $this->load->helper('captcha');

        $vals = array(
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 5
        );
        $captcha = create_captcha($vals);
        return $captcha;
    }

    public function show_captcha() {
        $captcha = $this->captcha();
        $arr = array('image' => $captcha['image'], 'word' => $captcha['word']);
        echo json_encode($arr);
    }

    public function signup() {
        if (isset($_POST) && $_POST != NULL) {
            $data = $_POST;
            $news = $this->news();
            $this->load->model('model_hotel');
            $result = $this->model_hotel->insert_customer($data);
            $this->session->set_userdata('iCustomerId', $result['customer'][0]['iCustomerId']);
            $book_details = $this->session->all_userdata();
            $date_details = $this->session_details();
            if ($result['count'] === 1) {
                $this->load->view('templates/header', array('search' => 'reservation'));
                $this->load->view('pages/reservation', array('news' => $news, 'book_details' => $book_details, 'customer' => $result['customer'][0], 'date_details' => $date_details));
                $this->load->view('templates/footer');
            }
        }
    }
    
    public function randomPassword() {
        $lowercase = "qwertyuiopasdfghjklzxcvbnm";
        $uppercase = "ASDFGHJKLZXCVBNMQWERTYUIOP";
        $numbers = "1234567890";
        $specialcharacters = "$@#";
        $randomCode = "";
        $length = 4;
        mt_srand(crc32(microtime()));
        $max = strlen($lowercase) - 1;
        for ($x = 0; $x < abs($length / 2); $x++) {
            $randomCode .= $lowercase{mt_rand(0, $max)};
        }
        $max = strlen($uppercase) - 1;
        for ($x = 0; $x < abs($length / 2); $x++) {
            $randomCode .= $uppercase{mt_rand(0, $max)};
        }
        $max = strlen($specialcharacters) - 1;
        for ($x = 0; $x < abs($length / 2); $x++) {
            $randomCode .= $specialcharacters{mt_rand(0, $max)};
        }
        $max = strlen($numbers) - 1;
        for ($x = 0; $x < abs($length / 2); $x++) {
            $randomCode .= $numbers{mt_rand(0, $max)};
        }
       return str_shuffle($randomCode);
    }
    
    public function sendmail() {
        $password = $this->randomPassword();
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => MY_EMAIL,
            'smtp_pass' => MY_PASSWORD,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->email->initialize($config); //no need to initialize $config coz we written it in config/email.php
        $this->email->from(FROM_EMAIL, from_name);
        $this->email->to($_POST['email']);
        $this->email->subject('Welcome To MyHotels Ahmedabad');
        $this->email->message(nl2br('Good Morning..!!!
           
        Dear '.$_POST['name'].',
            Greetings Of the day,
            
            Congratulation, You Have Succesfully Registered with us,
            here your login credentials.

            --------------------------------
            Your Email :  '.$_POST['email'].'  
            Your Password : '.$password.'    
            -------------------------------- 
            
            you can login with this credentials.
            
            Thanks & Regards,
            MyHotels,
            Ahmedabad.
                                                                   
                                                                       
                                                                                '));
        if ($this->email->send()) {
           $this->load->model('model_hotel');
           $this->model_hotel->set_password($_POST['cust_id'],$password);
        } else {

            echo 'mail not sent';
        }
        unset($_POST['email']);
    }

    public function currency() {
        $price = $_POST['price'];
        $from = "INR";
        $to = "USD";
        $url = 'http://www.webservicex.net/CurrencyConvertor.asmx/ConversionRate?FromCurrency=' . $from . '&ToCurrency=' . $to;
        $rate = simplexml_load_file($url);
        echo 'Rate from ' . $from . ' to ' . $to . ' is: ' .$rate[0].'<br>' ;
        $total_room_price = intval($price);
        $currency_rate = floatval($rate[0]);
        $final_price = ($currency_rate * $total_room_price);
        return $final_price;
    }

}

?>
