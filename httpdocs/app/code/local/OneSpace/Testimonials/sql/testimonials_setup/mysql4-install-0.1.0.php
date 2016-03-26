<?php
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
  ->newTable($installer->getTable('testimonials/testimonial'))
  ->addColumn('testimonial_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
      'identity'  => true,
      'unsigned'  => true,
      'nullable'  => false,
      'primary'   => true,
    ), 'Id')
  ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
      'nullable'  => false
    ), 'Customer Id')
  ->addColumn('post', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
      'nullable'  => false
    ), 'Text');
  $installer->getConnection()->createTable($table);

$installer->endSetup();