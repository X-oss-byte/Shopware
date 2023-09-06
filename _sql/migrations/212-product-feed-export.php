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

class Migrations_Migration212 extends Shopware\Components\Migrations\AbstractMigration
{
    public function up($modus)
    {
        $sql = <<<'EOD'
        UPDATE s_export
            SET header = '{strip}\nid{#S#}\ntitel{#S#}\nbeschreibung{#S#}\nlink{#S#}\nbild_url{#S#}\nean{#S#}\ngewicht{#S#}\nmarke{#S#}\nmpn{#S#}\nzustand{#S#}\nproduktart{#S#}\npreis{#S#}\nversand{#S#}\nstandort{#S#}\nwährung\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape|htmlentities}{#S#}\n{$sArticle.description_long|strip_tags|html_entity_decode|trim|regex_replace:"#[^\\wöäüÖÄÜß\\.%&-+ ]#i":""|strip|truncate:500:"...":true|htmlentities|escape}{#S#}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{$sArticle.image|image:4}{#S#}\n{$sArticle.ean|escape}{#S#}\n{if $sArticle.weight}{$sArticle.weight|escape:"number"}{" kg"}{/if}{#S#}\n{$sArticle.supplier|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\nNeu{#S#}\n{$sArticle.articleID|category:" > "|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\nDE::DHL:{$sArticle|@shippingcost:"prepayment":"de"}{#S#}\n{#S#}\n{$sCurrency.currency}\n{/strip}{#L#}'
            WHERE s_export.name = 'Google Produktsuche'
            AND header = '{strip}\nid{#S#}\ntitel{#S#}\nbeschreibung{#S#}\nlink{#S#}\nbild_url{#S#}\nean{#S#}\ngewicht{#S#}\nmarke{#S#}\nmpn{#S#}\nzustand{#S#}\nproduktart{#S#}\npreis{#S#}\nversand{#S#}\nstandort{#S#}\nwährung\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape|htmlentities}{#S#}\n{$sArticle.description_long|strip_tags|html_entity_decode|trim|regex_replace:"#[^\\wöäüÖÄÜß\\.%&-+ ]#i":""|strip|truncate:500:"...":true|htmlentities|escape}{#S#}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{$sArticle.image|image:4}{#S#}\n{$sArticle.ean|escape}{#S#}\n{if $sArticle.weight}{$sArticle.weight|escape:"number"}{" kg"}{/if}{#S#}\n{$sArticle.supplier|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\nNeu{#S#}\n{$sArticle.articleID|category:" > "|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\nDE::DHL:{$sArticle|@shippingcost:"prepayment":"de"},AT::DHL:{$sArticle|@shippingcost:"prepayment":"at"}{#S#}\n{#S#}\n{$sCurrency.currency}\n{/strip}{#L#}'
        ;
        UPDATE s_export
            SET header = '{strip}\nurl{#S#}\ntitle{#S#}\ndescription{#S#}\nprice{#S#}\nofferid{#S#}\nimage{#S#}\navailability{#S#}\ndeliverycost\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{$sArticle.name|escape|truncate:70}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:150:"...":true|html_entity_decode|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\n{$sArticle.ordernumber}{#S#}\n{$sArticle.image|image:5|escape}{#S#}\n{if $sArticle.instock}001{else}002{/if}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}\n{/strip}{#L#}'
            WHERE s_export.name = 'Kelkoo'
            AND header = '{strip}\nurl{#S#}\ntitle{#S#}\ndescription{#S#}\nprice{#S#}\nofferid{#S#}\nimage{#S#}\navailability{#S#}\ndeliverycost\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{$sArticle.name|escape}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\n{$sArticle.ordernumber}{#S#}\n{$sArticle.image|image:5|escape}{#S#}\n{if $sArticle.instock}001{else}002{/if}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}\n{/strip}{#L#}'
        ;
        UPDATE s_export
            SET header = '{strip}\naid{#S#}\nbrand{#S#}\nmpnr{#S#}\nean{#S#}\nname{#S#}\ndesc{#S#}\nshop_cat{#S#}\nprice{#S#}\nppu{#S#}\nlink{#S#}\nimage{#S#}\ndlv_time{#S#}\ndlv_cost{#S#}\npzn\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.ordernumber}{#S#}\n{$sArticle.supplier|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\n{$sArticle.ean|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|escape}{#S#}\n{$sArticle.articleID|category:">"|escape}{#S#}\n{$sArticle.price|escape:number}{#S#}\n{if $sArticle.purchaseunit}{$sArticle.price/$sArticle.purchaseunit*$sArticle.referenceunit|escape:number} {"\\x80"} / {$sArticle.referenceunit} {$sArticle.unit}{/if}{#S#}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{$sArticle.image|image:5}{#S#}\n{if $sArticle.instock}2 Tage{elseif $sArticle.shippingtime}{$sArticle.shippingtime} Tage{else}10 Tage{/if}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de"|escape:number}{#S#}\n\n{/strip}{#L#}'
            WHERE s_export.name = 'billiger.de'
            AND header = '{strip}\nid{#S#}\nhersteller{#S#}\nmodell_nr{#S#}\nname{#S#}\nkategorie{#S#}\npreis{#S#}\nbeschreibung{#S#}\nbild_klein{#S#}\nbild_gross{#S#}\nlink{#S#}\nlieferzeit{#S#}\nlieferkosten{#S#}\nwaehrung{#S#}\naufbauservice{#S#}\n24_Std_service{#S#}\nEAN{#S#}\nASIN{#S#}\nISBN{#S#}\nPZN{#S#}\nISMN{#S#}\nEPC{#S#}\nVIN{#S#}\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.ordernumber}|\n{$sArticle.supplier|replace:"|":""}|\n{$sArticle.name|replace:"|":""}|\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|replace:"|":""}|\n{$sArticle.articleID|category:">"|replace:"|":""}|\n{$sArticle.price|escape:"number"}|\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|replace:"|":""}|\n{$sArticle.image|image:3}|\n{$sArticle.image|image:5}|\n{$sArticle.articleID|link:$sArticle.name|replace:"|":""}|\n{if $sArticle.instock}2 Tage{elseif $sArticle.shippingtime}{$sArticle.shippingtime} Tage{else}10 Tage{/if}|\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}|\n{$sCurrency.currency}|\n|\n|\n{$sArticle.ean|replace:"|":""}|\n|\n|\n|\n|\n|\n|\n{/strip}{#L#}'
        ;
        UPDATE s_export
            SET header = '{strip}\nKategorie{#S#}\nHersteller{#S#}\nProduktbezeichnung{#S#}\nPreis{#S#}\nHersteller-Artikelnummer{#S#}\nEAN{#S#}\nPZN{#S#}\nISBN{#S#}\nVersandkosten Nachnahme{#S#}\nVersandkosten Vorkasse{#S#}\nVersandkosten Bankeinzug{#S#}\nDeeplink{#S#}\nLieferzeit{#S#}\nArtikelnummer{#S#}\nLink Produktbild{#S#}\nProdukt Kurztext\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.articleID|category:">"|escape|replace:"|":""}{#S#}\n{$sArticle.supplier|replace:"|":""}{#S#}\n{$sArticle.name|strip_tags|strip|trim|html_entity_decode|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\n{#S#}\n{#S#}\n{#S#}\n{#S#}\n{$sArticle|@shippingcost:"cash":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle|@shippingcost:"debit":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle.articleID|link:$sArticle.name|replace:"|":""}{#S#}\n{if $sArticle.instock}2 Tage{elseif $sArticle.shippingtime}{$sArticle.shippingtime|escape} Tage{else}10 Tage{/if}{#S#}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.image|image:5}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:300:"...":true|escape}\n{/strip}{#L#}'
            WHERE s_export.name = 'Idealo'
            AND header = '{strip}\nKategorie|\nHersteller|\nProduktbezeichnung|\nHersteller-Artikelnummer|\nEAN|\nPZN|\nISBN|\nPreis|\nVersandkosten Nachnahme|\nVersandkosten Vorkasse|\nVersandkosten Bankeinzug|\nDeeplink|\nLieferzeit|\nArtikelnummer|\nLink Produktbild|\nProdukt Kurztext|\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.articleID|category:">"|escape}|\n{$sArticle.supplier|replace:"|":""}|\n{$sArticle.name|replace:"|":""}|\n{$sArticle.suppliernumber|replace:"|":""}|\n{$sArticle.ean|escape}|\n|\n|\n{$sArticle.price|escape:"number"}|\n{$sArticle|@shippingcost:"cash":"de":"Deutsche Post Standard"|escape:"number"}|\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}|\n{$sArticle|@shippingcost:"debit":"de":"Deutsche Post Standard"|escape:"number"}|\n{$sArticle.articleID|link:$sArticle.name|replace:"|":""}|\n{if $sArticle.instock}2 Tage{elseif $sArticle.shippingtime}{$sArticle.shippingtime} Tage{else}10 Tage{/if}|\n{$sArticle.ordernumber|escape}|\n{$sArticle.image|image:5}{#S#}|\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|replace:"|":""}|\n{/strip}{#L#}'
        ;
        UPDATE s_export
            SET header = '{strip}foreign_id{#S#}\narticle_nr{#S#}\ntitle{#S#}\ntax{#S#}\ncategories{#S#}\nunits{#S#}\nshort_desc{#S#}\nlong_desc{#S#}\npicture{#S#}\nurl{#S#}\nprice{#S#}\nprice_uvp{#S#}\ndelivery_date{#S#}\ntop_offer{#S#}\nstock{#S#}\npackage_size{#S#}\nquantity_unit{#S#}\nmpn{#S#}\nmanufacturer{#S#}\nstatus{#S#}\nvariants\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.articleID|escape}{#S#}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|replace:"|":""} {#S#}\n{$sArticle.tax}{#S#}\n{$sArticle.articleID|category:">"|escape},{$sArticle.supplier}{#S#}\n{$sArticle.weight}{#S#}\n{$sArticle.description|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|replace:"|":""|escape}{#S#}\n"{$sArticle.description_long|trim|html_entity_decode|replace:"|":"|"|replace:''"'':''""''}<p>{$sArticle.attr1|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr2|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr3|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr4|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr5|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr6|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr7|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr8|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr9|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr10|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr11|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr12|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr13|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr14|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr15|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr16|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr17|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr18|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr19|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}<p>{$sArticle.attr20|regex_replace:"/^(\\d)$/":""|regex_replace:"/^0000-00-00$":""|strip}"{#S#}\n{$sArticle.image|image:5}{#S#}\n{$sArticle.articleID|link:$sArticle.name|replace:"|":""}{#S#}\n{if $sArticle.configurator}0{else}{$sArticle.price|escape:"number"|escape}{/if}{#S#}\n{$sArticle.pseudoprice|escape}{#S#}\nLieferzeit in Tagen: {$sArticle.shippingtime|replace:"0":"sofort"}{#S#}\n{$sArticle.topseller}{#S#}\n{if $sArticle.configurator}"-1"{else}{$sArticle.instock}{/if}{#S#}\n{$sArticle.purchaseunit}{#S#}\n{$sArticle.unit_description}{#S#}\n{$sArticle.suppliernumber}{#S#}\n{$sArticle.supplier}{#S#}\n{$sArticle.active}{#S#}\n{if $sArticle.configurator}{$sArticle.articleID|escape}{else}{/if}\n{/strip}{#L#}'
            WHERE s_export.name = 'Yatego'
            AND header = '{strip}\nforeign_id{#S#}\narticle_nr{#S#}\ntitle{#S#}\ncategories{#S#}\nlong_desc{#S#}\npicture{#S#}\nurl{#S#}\ndelivery_surcharge{#S#}\nprice\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|replace:"|":""}{#S#}\n{$sArticle.articleID|category:">"|escape}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|replace:"|":""|escape}{#S#}\n{$sArticle.image|image:2}{#S#}\n{$sArticle.articleID|link:$sArticle.name|replace:"|":""}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle.price|escape:"number"}\n{/strip}{#L#}'
        ;

        UPDATE s_export
            SET header = '{strip}\nEindeutige Händler-Artikelnummer{#S#}\nPreis in Euro{#S#}\nKategorie{#S#}\nProduktbezeichnung{#S#}\nProduktbeschreibung{#S#}\nLink auf Detailseite{#S#}\nLieferzeit{#S#}\nEAN-Nummer{#S#}\nHersteller-Artikelnummer{#S#}\nLink auf Produktbild{#S#}\nHersteller{#S#}\nVersandVorkasse{#S#}\nVersandNachnahme{#S#}\nVersandLastschrift{#S#}\nVersandKreditkarte{#S#}\nVersandRechnung{#S#}\nVersandPayPal\n{/strip}{#L#}',
            body = '{strip}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.price|escape:"number"|escape}{#S#}\n{$sArticle.articleID|category:">"|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|escape}{#S#}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{#F#}{if $sArticle.instock}1-3 Werktage{elseif $sArticle.shippingtime}{$sArticle.shippingtime} Tage{else}10 Tage{/if}{#F#}{#S#}\n{$sArticle.ean|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\n{$sArticle.image|image:2|escape}{#S#}\n{$sArticle.supplier|escape}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de"|escape:"number"|escape}{#S#}\n{$sArticle|@shippingcost:"cash":"de"|escape:"number"|escape}{#S#}\n{$sArticle|@shippingcost:"debit":"de"|escape:"number"|escape}{#S#}\n{""|escape}{#S#}\n{$sArticle|@shippingcost:"invoice":"de"|escape:"number"|escape}{#S#}\n{$sArticle|@shippingcost:"paypal":"de"|escape:"number"|escape}{#S#}\n{/strip}{#L#}'
            WHERE s_export.name = 'evendi.de'
            AND header = '{strip}\nEindeutige Händler-Artikelnummer{#S#}\nPreis in Euro{#S#}\nKategorie{#S#}\nProduktbezeichnung{#S#}\nProduktbeschreibung{#S#}\nLink auf Detailseite{#S#}\nLieferzeit{#S#}\nEAN-Nummer{#S#}\nHersteller-Artikelnummer{#S#}\nLink auf Produktbild{#S#}\nHersteller{#S#}\nVersandVorkasse{#S#}\nVersandNachnahme{#S#}\nVersandLastschrift{#S#}\nVersandKreditkarte{#S#}\nVersandRechnung{#S#}\nVersandPayPal\n{/strip}{#L#}'
            AND body = '{strip}\n{$sArticle.ordernumber|escape}{#S#}\n{$sArticle.price|escape:"number"}{#S#}\n{$sArticle.articleID|category:">"|escape}{#S#}\n{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape}{#S#}\n{$sArticle.description_long|strip_tags|strip|trim|truncate:900:"...":true|html_entity_decode|escape}{#S#}\n{$sArticle.articleID|link:$sArticle.name|escape}{#S#}\n{if $sArticle.instock}1-3 Werktage{elseif $sArticle.shippingtime}{$sArticle.shippingtime} Tage{else}10 Tage{/if}{#S#}\n{$sArticle.ean|escape}{#S#}\n{$sArticle.suppliernumber|escape}{#S#}\n{$sArticle.image|image:2}{#S#}\n{$sArticle.supplier|escape}{#S#}\n{$sArticle|@shippingcost:"prepayment":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle|@shippingcost:"cash":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle|@shippingcost:"debit":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{#S#}\n{$sArticle|@shippingcost:"invoice":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{$sArticle|@shippingcost:"paypal":"de":"Deutsche Post Standard"|escape:"number"}{#S#}\n{/strip}{#L#}'
        ;
        UPDATE s_export
            SET header = '<?xml version="1.0" encoding="UTF-8" ?>\n<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0" xmlns:atom="http://www.w3.org/2005/Atom">\n<channel>\n	<atom:link href="http://{$sConfig.sBASEPATH}/engine/connectors/export/{$sSettings.id}/{$sSettings.hash}/{$sSettings.filename}" rel="self" type="application/rss+xml" />\n	<title>{$sConfig.sSHOPNAME}</title>\n	<description>Beschreibung im Header hinterlegen</description>\n	<link>http://{$sConfig.sBASEPATH}</link>\n	<language>DE</language>\n	<image>\n		<url>http://{$sConfig.sBASEPATH}/templates/_default/frontend/_resources/images/logo.jpg</url>\n		<title>{$sConfig.sSHOPNAME}</title>\n		<link>http://{$sConfig.sBASEPATH}</link>\n	</image>',
            body = '<item> \n    <g:id>{$sArticle.articleID|escape}</g:id>\n	<title>{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape}</title>\n	<description>{$sArticle.description_long|strip_tags|strip|truncate:900:"..."|escape}</description>\n	<g:google_product_category>Wählen Sie hier Ihre Google Produkt-Kategorie</g:google_product_category>\n	<g:product_type>{$sArticle.articleID|category:" > "|escape}</g:product_type>\n	<link>{$sArticle.articleID|link:$sArticle.name|escape}</link>\n	<g:image_link>{$sArticle.image|image:4}</g:image_link>\n	<g:condition>neu</g:condition>\n	<g:availability>{if $sArticle.esd}bestellbar{elseif $sArticle.instock>0}bestellbar{elseif $sArticle.releasedate && $sArticle.releasedate|strtotime > $smarty.now}vorbestellt{elseif $sArticle.shippingtime}bestellbar{else}nicht auf lager{/if}</g:availability>\n	<g:price>{$sArticle.price|format:"number"}</g:price>\n	<g:brand>{$sArticle.supplier|escape}</g:brand>\n	<g:gtin>{$sArticle.suppliernumber|replace:"|":""}</g:gtin>\n	<g:mpn>{$sArticle.suppliernumber|escape}</g:mpn>\n	<g:shipping>\n       <g:country>DE</g:country>\n       <g:service>Standard</g:service>\n       <g:price>{$sArticle|@shippingcost:"prepayment":"de"|escape:number}</g:price>\n    </g:shipping>\n  {if $sArticle.changed}<pubDate>{$sArticle.changed|date_format:"%a, %d %b %Y %T %Z"}</pubDate>{/if}		\n</item>'
            WHERE s_export.name = 'Google Produktsuche XML'
            AND header = '<?xml version="1.0" encoding="UTF-8" ?>\n\n<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0" xmlns:atom="http://www.w3.org/2005/Atom">\n<channel>\n	<atom:link href="http://{$sConfig.sBASEPATH}/engine/connectors/export/{$sSettings.id}/{$sSettings.hash}/{$sSettings.filename}" rel="self" type="application/rss+xml" />\n	<title>{$sConfig.sSHOPNAME}</title>\n	<description>test</description>\n	<link>http://{$sConfig.sBASEPATH}</link>\n	<language>{$sLanguage.isocode}-{$sLanguage.isocode}</language>\n	<image>\n		<url>http://{$sConfig.sBASEPATH}/templates/0/de/media/img/default/store/logo.gif</url>\n		<title>{$sConfig.sSHOPNAME}</title>\n		<link>http://{$sConfig.sBASEPATH}</link>\n	</image>'
            AND body = '<item> \n	<title>{$sArticle.name|strip_tags|strip|truncate:80:"...":true|escape}</title>\n	<guid>{$sArticle.articleID|link:$sArticle.name|escape}</guid>\n	<link>{$sArticle.articleID|link:$sArticle.name|escape}</link>\n	<description>{$sArticle.description_long|strip_tags|regex_replace:"/[^wöäüÖÄÜß .?!,&:%;-\\"'']/i":""|trim|truncate:900:"..."|escape}</description>\n	<category>{$sArticle.articleID|category:" > "|escape}</category>\n	{if $sArticle.changed}<pubDate>{$sArticle.changed|date_format:"%a, %d %b %Y %T %Z"}</pubDate>{/if}\n	<g:bild_url>{$sArticle.image|image:4}</g:bild_url>\n{*<g:verfallsdatum>2006-12-20</g:verfallsdatum>*}\n	<g:preis>{$sArticle.price|format:"number"}</g:preis>\n{*<g:preisart>ab</g:preisart>*}\n{*	<g:währung>{$sCurrency.currency}</g:währung>*}\n{*	<g:zahlungsmethode>Barzahlung;Scheck;Visa;MasterCard;AmericanExpress;Lastschrift</g:zahlungsmethode>*}\n{*<g:menge>20</g:menge>*}\n	<g:marke>{$sArticle.supplier|escape}</g:marke>\n	<g:ean>{$sArticle.ean|escape}</g:ean>\n{*<g:hersteller>{$sArticle.supplier|escape}</g:hersteller>*}\n{*<g:hersteller_kennung>834</g:hersteller_kennung>*}\n{*<g:speicher>512</g:speicher>*}\n{*<g:prozessorgeschwindigkeit>2</g:prozessorgeschwindigkeit>*}\n	<g:modellnummer>{$sArticle.suppliernumber|escape}</g:modellnummer>\n{*<g:größe>14x14x3</g:größe>*}\n	<g:gewicht>2</g:gewicht>\n	<g:zustand>neu</g:zustand>\n{*<g:farbe>schwarz</g:farbe>*}\n	<g:produktart>{$sArticle.articleID|category:"/"|escape}</g:produktart>\n</item>'
        ;
EOD;

        $this->addSql($sql);
    }
}
