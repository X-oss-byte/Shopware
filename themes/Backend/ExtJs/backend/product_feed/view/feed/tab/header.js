/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our licensing model, this program can be used
 * under the terms of the GNU Affero General Public License, version 3.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission can be found at and in the LICENSE file you have received
 * along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore, any rights, title and interest in
 * our trademarks remain entirely with the shopware AG.
 *
 * @category   Shopware
 * @package    ProductFeed
 * @subpackage View
 * @version    $Id$
 * @author shopware AG
 */

//{namespace name="backend/product_feed/view/feed"}

/**
 * Shopware UI - Tab View.
 *
 * Displays all tab header Information
 */
//{block name="backend/product_feed/view/feed/tab/header"}
Ext.define('Shopware.apps.ProductFeed.view.feed.tab.Header', {
    extend: 'Shopware.apps.ProductFeed.view.feed.tab.Body',
    alias: 'widget.product_feed-feed-tab-header',
    title: '{s name="tab/title/header"}Header{/s}',
    fieldName: 'header'
});
//{/block}
