<?php
class Get4Cast_SalesForecast_Block_Adminhtml_Forecast_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel(
            'get4cast_salesforecast/forecast_collection'
        );
        $this->setCollection($collection);
        
        return parent::_prepareCollection();
    }
    
    public function getRowUrl($row)
    {
		$action_name = $this->getRequest()->getActionName();
		$admin_session = Mage::getSingleton('admin/session');
		if($admin_session->isAllowed('admin/report/get4cast_salesforecast/sales_forecast/new_forecast')){
			return $this->getUrl(
				'get4cast_salesforecast_admin/forecast/edit', 
				array(
					'id' => $row->getId()
				)
			);
		}
		return null;
        
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => $this->__('ID'),
            'type' => 'number',
            'index' => 'entity_id',
			'align' =>'center',
        ));
        $this->setDefaultSort('entity_id');
		$this->setDefaultDir('desc');
        
        $this->addColumn('created_at', array(
            'header' => $this->__('Created at'),
            'type' => 'datetime',
            'index' => 'created_at',
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));

        $this->addColumn('updated_at', array(
            'header' => $this->__('Updated at'),
            'type' => 'date',
            'index' => 'updated_at',
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));
        
        $this->addColumn('store_group_name', array(
            'header' => $this->__('Store'),
            'type' => 'text',
            'index' => 'store_group_name',
        ));
        
        $this->addColumn('period_start', array(
            'header' => $this->__('Period start'),
            'type' => 'date',
            'index' => 'period_start',
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));
        
        $this->addColumn('period_end', array(
            'header' => $this->__('Period end'),
            'type' => 'date',
            'index' => 'period_end',
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));
        
        $this->addColumn('forecast_date_end', array(
            'header' => $this->__('Forecast day'),
            'type' => 'date',
            'index' => 'forecast_date_end',
        ));
        
        $this->addColumn('price', array(
            'header' => $this->__('Report price'),
            'type' => 'text',
            'index' => 'price',
        ));
        
        $this->addColumn('payment_status', array(
            'header' => $this->__('Payment status'),
            'type' => 'text',
            'index' => 'payment_status',
            'renderer' =>  'Get4Cast_SalesForecast_Block_Adminhtml_Translate'
        ));
        
        $this->addColumn('url', array(
            'header' => $this->__('Open report'),
            'type' => 'text',
            'index' => 'url',
            'renderer' =>  'Get4Cast_SalesForecast_Block_Adminhtml_Url'
        ));
        
        $this->addColumn('status', array(
            'header' => $this->__('Report status'),
            'type' => 'text',
            'index' => 'status',
            'renderer' =>  'Get4Cast_SalesForecast_Block_Adminhtml_Translate'
        ));
        
        return parent::_prepareColumns();
    }
}
