<?php
$this->load->view('header', $title);
$real_data = isset($real_data) ? $real_data : array();
$this->load->view($main_content, $real_data);
$this->load->view('footer');
