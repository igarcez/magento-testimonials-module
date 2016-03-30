<?php
class Onespace_Testimonials_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid {
  protected function _prepareCollection()
  {
    $collection = Mage::getResourceModel('testimonials/testimonial_collection');
    $this->setCollection($collection);
    return parent::_prepareCollection();
  }

  public function getRowUrl($row)
  {
    return $this->getUrl('adminhtml/testimonials/edit', array('id' => $row->getTestimonialId()));
  }

  protected function _prepareColumns()
  {
      $this->addColumn('testimonial_id', array(
        'header' => $this->_getHelper()->__('ID'),
        'type' => 'number',
        'index' => 'testimonial_id'
      ));
      $this->addColumn('post', array(
        'header' => $this->_getHelper()->__('Post'),
        'type' => 'text',
        'index' => 'post'
      ));
      $this->addColumn('customer_id', array(
        'header' => $this->_getHelper()->__('Customer ID'),
        'type' => 'text',
        'index' => 'customer_id'
      ));

      return parent::_prepareColumns();
  }

  protected function _getHelper()
  {
    return Mage::helper('testimonials');
  }
}