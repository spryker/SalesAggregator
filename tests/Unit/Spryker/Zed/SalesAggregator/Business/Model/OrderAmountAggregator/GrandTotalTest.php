<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Unit\Spryker\Zed\SalesAggregator\Business\Model\OrderAmountAggregator;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Spryker\Zed\SalesAggregator\Business\Model\OrderAmountAggregator\GrandTotal;

class GrandTotalTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testGrandTotalShouldSumSubtotalWithExpenses()
    {
        $grandTotalAggregator = $this->createGrandTotalAggregator();
        $orderTransfer = $this->createOrderTransfer();
        $grandTotalAggregator->aggregate($orderTransfer);

        $this->assertEquals(300, $orderTransfer->getTotals()->getGrandTotal());
    }

    /**
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    protected function createOrderTransfer()
    {
        $orderTransfer = new OrderTransfer();

        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer->setSubtotal(200);
        $totalsTransfer->setExpenseTotal(100);

        $orderTransfer->setTotals($totalsTransfer);

        return $orderTransfer;
    }

    /**
     * @return \Spryker\Zed\Sales\Business\Model\OrderAmountAggregator\GrandTotal
     */
    protected function createGrandTotalAggregator()
    {
        return new GrandTotal();
    }

}
