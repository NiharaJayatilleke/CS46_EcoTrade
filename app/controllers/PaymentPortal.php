<?php
    class PaymentPortal extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function index(){
            $data = [];
            $this->view('item_ads/v_paymentportal',$data);

        }
    }
?>