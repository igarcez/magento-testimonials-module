<?php
class Onespace_Testimonials_Block_Form extends Mage_Core_Block_Template {
  private $model;

  public function __construct(){
    parent::__construct();
    $this->model = Mage::getModel('testimonials/testimonial');
  }

  public function canPost() {
    return Mage::getSingleton('customer/session')->isLoggedIn();
  }

  public function getPostActionUrl() {
    return $this->getUrl('testimonials/index/save');
  }

}