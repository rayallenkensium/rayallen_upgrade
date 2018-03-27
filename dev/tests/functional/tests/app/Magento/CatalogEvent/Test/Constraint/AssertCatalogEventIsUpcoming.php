<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CatalogEvent\Test\Constraint;

/**
 * Class AssertCatalogEventIsUpcoming
 * Check event status 'Coming Soon' on category/product pages
 */
class AssertCatalogEventIsUpcoming extends AssertCatalogEventStatus
{
    /**
     * Event status 'Coming Soon' on category/product pages
     *
     * @var string
     */
    protected $eventStatus = 'Coming Soon';
}