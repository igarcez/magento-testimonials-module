<?php
class Onespace_Testimonials_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid {
  protected function _prepareCollection()
  {
    $collection = Mage::getResourceModel('testimonials/testimonial_collection');
    $fn = Mage::getModel('eav/entity_attribute')->loadByCode('1', 'firstname');
    $ln = Mage::getModel('eav/entity_attribute')->loadByCode('1', 'lastname');
    $collection->getSelect()
      ->join('customer_entity', 'main_table.customer_id = customer_entity.entity_id', array('customer_email' => 'email'))
      ->join(array('ce1' => 'customer_entity_varchar'), 'ce1.entity_id=main_table.customer_id', array('firstname' => 'value'))
      ->where('ce1.attribute_id='.$fn->getAttributeId())
      ->join(array('ce2' => 'customer_entity_varchar'), 'ce2.entity_id=main_table.customer_id', array('lastname' => 'value'))
      ->where('ce2.attribute_id='.$ln->getAttributeId())
      ->columns(new Zend_Db_Expr("CONCAT(`ce1`.`value`, ' ',`ce2`.`value`) AS customer_name"));
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
        'index' => 'customer_id',
        'width' => '25px'
      ));
      $this->addColumn('customer_name', array(
        'header' => $this->_getHelper()->__('Name'),
        'type' => 'text',
        'index' => 'customer_name',
        'width' => '225px'
      ));
      $this->addColumn('customer_email', array(
        'header' => $this->_getHelper()->__('Email'),
        'type' => 'text',
        'index' => 'customer_email',
        'width' => '225px'
      ));


      return parent::_prepareColumns();
  }

  protected function _getHelper()
  {
    return Mage::helper('testimonials');
  }
}