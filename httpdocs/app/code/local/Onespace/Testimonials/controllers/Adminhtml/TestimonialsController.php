<?php
class Onespace_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action {
  public function indexAction()
  {
    $this->loadLayout();
    $testimonials_block = $this->getLayout()->createBlock('testimonials/adminhtml_testimonials');

    $this->_addContent($testimonials_block)
      ->renderLayout();
  }

  public function editAction()
  {
    $testimonial = Mage::getModel('testimonials/testimonial');
    $testimonial->load($this->getRequest()->getParam('id'));
    Mage::register('current_testimonial', $testimonial);
    $editTestimonialBlock = $this->getLayout()->createBlock('testimonials/adminhtml_testimonial_edit');
    $this->loadLayout();
    $this->_addContent($editTestimonialBlock);
    $this->renderLayout();
  }
}