<?php
class Onespace_Testimonials_Block_Adminhtml_Testimonials extends Mage_Adminhtml_Block_Widget_Grid_Container {
  protected function _construct()
  {
    parent::_construct();
    $this->_blockGroup = 'testimonials';
    $this->_controller = 'adminhtml_testimonial';
    $this->_headerText = Mage::helper('testimonials')->__('Testimonials');
    $this->_removeButton('add');
  }
}