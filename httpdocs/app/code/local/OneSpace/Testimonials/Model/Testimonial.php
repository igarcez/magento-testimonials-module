<?php
class OneSpace_Testimonials_Model_Testimonial extends Mage_Core_Model_Abstract {
  protected function _construct()
  {
    $this->_init('testimonials/testimonial');
  }

  public function getCustomerName()
  {
    return Mage::getModel('customer/customer')->load($this->getCustomerId())->getName();
  }
}