<?php
class Onespace_Testimonials_Block_Adminhtml_Testimonial_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
  protected function _prepareForm()
  {
    $form = new Varien_Data_Form(array(
      'id' => 'edit_form',
      'action' => $this->getUrl('adminhtml/testimonials/edit', array(
        '_current' => true,
        'continue' => 0,
        )
      ),
      'method' => 'post',
    ));
    $form->setUseContainer(true);
    $this->setForm($form);

    $fieldset = $form->addFieldSet('general', array('legend' => $this->__('Testimonial Details')));

    $this->_addFieldsToFieldset($fieldset, array (
      'post' => array(
        'label' => $this->__('Post'),
        'input' => 'textarea',
        'required' => true
        ),
      'customer_id' => array(
        'label' => $this->__('Customer Id'),
        'input' => 'text',
        'required' => true
        )
    ));
    return $this;
  }

  protected function _addFieldsToFieldset(Varien_Data_Form_Element_Fieldset $fieldset, $fields)
  {
    $requestData = new Varien_Object($this->getRequest()
      ->getPost('testimonialData'));

    foreach ($fields as $name => $_data) {
      if ($requestValue = $requestData->getData($name)) {
        $_data['value'] = $requestValue;
      }

      $_data['name'] = "testimonialData[$name]";

      $_data['title'] = $_data['label'];

      if (!array_key_exists('value', $_data)) {
          $_data['value'] = $this->_getTestimonial()->getData($name);
      }

      $fieldset->addField($name, $_data['input'], $_data);
    }

    return $this;
  }

  protected function _getTestimonial() {
    if(!$this->hasData('testimonial')){
      $testimonial = Mage::registry('current_testimonial');
      $this->setData('testimonial', $testimonial);
    }
    return $this->getData('testimonial');
  }
}