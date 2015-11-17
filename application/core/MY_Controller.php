<?php

class MY_Controller extends CI_Controller {

    public $site_data;

    function __construct() {
        parent::__construct();
        if (!isset($_COOKIE['cart_session'])) {
//            setcookie( 'cart_session', md5(rand(10000, 1000000)), time() + 3600, '/', $_SERVER['SERVER_NAME'] );
            setcookie('cart_session', md5(rand(10000, 1000000)));
        }
        $product_category = $this->modeldb->get("product_category");
        $setting = $this->modeldb->get_by(array('id' => 1), "setting");
        foreach ($setting as $d) {
            $site_setting = $d;
        }
        $this->site_data = array('product_category' => $product_category,
            'site_setting' => $site_setting);
        $this->load->vars($this->site_data);
        
    }

    function site_data() {
        return $this->site_data;
    }

}