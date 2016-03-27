<?php
class OneSpace_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
  public function indexAction() {
    $this->loadLayout();
    $this->renderLayout();
  }

  public function createAction() {
    $this->loadLayout();
    $this->renderLayout();
  }

  public function saveAction() {
    $customer_session = Mage::getSingleton('customer/session');
    if(!$customer_session->isLoggedIn()) die('must be logged');
    Mage::getModel('testimonials/testimonial')->saveNewTestimonial($this->getRequest()->getPost());
    Mage::getSingleton('core/session')->addSuccess('Thank you for sharing!');
    $this->_redirect('testimonials');
  }
}