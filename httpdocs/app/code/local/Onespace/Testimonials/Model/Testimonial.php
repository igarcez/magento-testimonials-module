<?php
class Onespace_Testimonials_Model_Testimonial extends Mage_Core_Model_Abstract {
  protected function _construct()
  {
    $this->_init('testimonials/testimonial');
  }

  public function getCustomerName()
  {
    return Mage::getModel('customer/customer')->load($this->getCustomerId())->getName();
  }

  public function saveNewTestimonial($post)
  {
    // I rather get the id here, so we can prevent some false post with other
    // customers id instead of the logged one
    $customer_id = Mage::getSingleton('customer/session')->getId();
    $this->setPost($post['post']);
    $this->setCustomerId($customer_id);
    $this->save();
  }
}