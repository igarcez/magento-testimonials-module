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

    // TODO change custom to testimonials
    $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
    $pager->setCollection($this->getCollection());
    $this->setChild('pager', $pager);
    $this->getCollection()->load();
    return $this;
  }

  public function getPagerHtml()
  {
    return $this->getChildHtml('pager');
  }
}