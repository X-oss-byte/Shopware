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
 */

/**
 * todo@all: Documentation
 */
//{block name="backend/index/model/merchant_mail"}
Ext.define('Shopware.apps.Index.model.MerchantMail', {
    extend: 'Ext.data.Model',
    fields: [
        //{block name="backend/index/model/merchant_mail/fields"}{/block}
        'content', 'fromMail', 'fromName', 'subject', 'toMail', 'userId', 'status' ]
});
//{/block}
