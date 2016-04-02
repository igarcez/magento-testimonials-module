<?php
class Onespace_Testimonials_Block_Adminhtml_Testimonial_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
  protected function _construct()
  {
    $this->_blockGroup = 'testimonials';
    $this->_controller = 'adminhtml_testimonial';
    $this->_mode = 'edit';
    $this->_headerText =  $this->__('Edit Testimonial');
  }
}