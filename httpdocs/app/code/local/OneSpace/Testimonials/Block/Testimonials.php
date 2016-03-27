<?php
class OneSpace_Testimonials_Block_Testimonials extends Mage_Core_Block_Template {
  public function __construct()
  {
    parent::__construct();

    $collection = Mage::getModel('testimonials/testimonial')->getCollection();
    $this->setCollection($collection);
  }

  protected function _prepareLayout()
  {
    parent::_prepareLayout();

    $pager = $this->getLayout()->createBlock('page/html_pager', 'testimonials.pager');
    $pager->setCollection($this->getCollection());
    $this->setChild('pager', $pager);
    $this->getCollection()->setOrder('testimonial_id', Varien_Data_Collection::SORT_ORDER_DESC)->load();
    return $this;
  }

  public function getPagerHtml()
  {
    return $this->getChildHtml('pager');
  }
}