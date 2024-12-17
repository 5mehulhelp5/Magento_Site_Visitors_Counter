<?php
namespace Mr\Visitors\Block\Adminhtml\Dashboard;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Module\Manager;
use Magento\Reports\Model\ResourceModel\Order\CollectionFactory;
use Magento\Customer\Model\ResourceModel\Visitor\Collection as VisitorCollection;

class Sales extends \Magento\Backend\Block\Dashboard\Sales
{
    protected $visitorCollection;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        Manager $moduleManager,
        VisitorCollection $visitorCollection,
        array $data = []
    ) {
        $this->_moduleManager = $moduleManager;
        $this->visitorCollection = $visitorCollection;
        parent::__construct($context, $collectionFactory, $moduleManager, $data);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        // Initialize visitor collection
        $visitorCollection = $this->visitorCollection;

        // Prepare date filters
        $todayStart = date('Y-m-d 00:00:00');
        $weekStart = date('Y-m-d 00:00:00', strtotime('-7 days'));

        // Variables to store counts
        $totalVisitors = 0;
        $todayVisitors = 0;
        $weeklyVisitors = 0;

        // Iterate through the collection and calculate counts
        foreach ($visitorCollection as $visitor) {
            $lastVisit = $visitor->getData('last_visit_at');

            $totalVisitors++;
            if ($lastVisit >= $todayStart) {
                $todayVisitors++;
            }
            if ($lastVisit >= $weekStart) {
                $weeklyVisitors++;
            }
        }

        // Add data to dashboard
        $this->addCustomerVisitor(__('Total Visitors:'), $totalVisitors);
        $this->addCustomerVisitor(__('Today\'s Visitors:'), $todayVisitors);
        $this->addCustomerVisitor(__('Weekly Visitors:'), $weeklyVisitors);
    }

    public function addCustomerVisitor($label, $value, $isQuantity = false)
    {
        $decimals = '';
        $this->_totals[] = [
            'label' => $label,
            'value' => "<span style='color: #eb5202;font-size: 2.4rem;'>" . $value . "</span>",
            'decimals' => $decimals
        ];
        return $this;
    }
}
