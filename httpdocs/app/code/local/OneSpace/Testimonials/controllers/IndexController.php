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
    $core_session = Mage::getSingleton('core/session');
    $customer_session = Mage::getSingleton('customer/session');
    if(!$customer_session->isLoggedIn())
    {
      $core_session->AddError('You must be logged in!');
      $this->_redirect('customer/account');
      return;
    }
    Mage::getModel('testimonials/testimonial')->saveNewTestimonial($this->getRequest()->getPost());
    $core_session->addSuccess('Thank you for sharing!');
    $this->_redirect('testimonials');
  }
}