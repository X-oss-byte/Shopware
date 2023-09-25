<?php
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

use Shopware\Components\Migrations\AbstractMigration;

class Migrations_Migration925 extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function up($modus)
    {
        $this->addSql('
CREATE TABLE `s_core_auth_config` (
`user_id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`config` longtext COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        ');
    }
}
