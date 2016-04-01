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

    if($post_data = $this->getRequest()->getPost('testimonialData')) {
      try {
        $testimonial->addData($post_data);
        $testimonial->save();

        $this->_getSession()->addSuccess($this->__('Testimonial updated successfully!'));

        return $this->_redirect('adminhtml/testimonials');
      } catch (Exception $e) {
        Mage::logException($e);
        $this->_getSession()->addError($e->getMessage());
      }
    }

    Mage::register('current_testimonial', $testimonial);
    $editTestimonialBlock = $this->getLayout()->createBlock('testimonials/adminhtml_testimonial_edit');
    $this->loadLayout();
    $this->_addContent($editTestimonialBlock);
    $this->renderLayout();
  }

  public function deleteAction() {
    $testimonial = Mage::getModel('testimonials/testimonial');
    if($testimonial_id = $this->getRequest()->getParam('id', false)){
      $testimonial->load($testimonial_id);
      try {
        $testimonial->delete();
        $this->_getSession()->addSuccess($this->__('Testimonial deleted successfully!'));
      } catch (Exception $e) {
        Mage::logException($e);
        $this->_getSession()->addError($e->getMessage());
      }
    } else {
      $this->_getSession()->addError($this->__('Id not specified'));
    }
    return $this->_redirect('adminhtml/testimonials');
  }
}