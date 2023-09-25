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

//{namespace name="backend/custom_search/translation"}

//{block name="backend/config/view/custom_search/facet/classes/facetinterface"}

Ext.define('Shopware.apps.Config.view.custom_search.facet.classes.FacetInterface', {

    /**
     * @api Defines the facet class which created for the \Shopware\Bundle\SearchBundle\Criteria
     * @returns { string }
     */
    getClass: function() {
        throw 'Unimplemented method.';
    },

    /**
     * @api Defines the constructor parameters for the facet.
     *
     * @returns { Array }
     */
    createItems: function () {
        throw 'Unimplemented method.';
    }
});

//{/block}
