<?php
$real_data = isset($real_data) ? $real_data : array();


$this->load->view('header', $title);
$this->load->view('menu');
$this->load->view($main_content, $real_data);
$this->load->view('footer');
