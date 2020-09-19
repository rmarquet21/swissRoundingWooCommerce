<?php
// Parametres
if (!defined('ABSPATH')) {
    exit();
}

class Swiss_Rounding_Settings_Tab
{

    public static function init()
    {
        add_filter('woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50);
        add_action('woocommerce_settings_tabs_settings_tab_swiss_rounding', __CLASS__ . '::settings_tab');
        add_action('woocommerce_update_options_settings_tab_swiss_rounding', __CLASS__ . '::update_settings');
    }

    public static function add_settings_tab($settings_tabs)
    {
        $settings_tabs['settings_tab_swiss_rounding'] = esc_html__('Réglages Centimes Suisse', 'swiss-5-cent-rounding');

        return $settings_tabs;
    }

    public static function settings_tab()
    {
        woocommerce_admin_fields(self::get_settings());
    }

    public static function update_settings()
    {
        woocommerce_update_options(self::get_settings());
    }

    public static function get_settings()
    {
        return [
            'section_title' => [
                'name' => esc_html__('Paramètres Centimes Suisse', 'swiss-5-cent-rounding'),
                'type' => 'title',
                'desc' => '',
                'id' => 'swiss_rounding_settings_title',
            ],
            'sr_round_discount_amounts' => [
                'name' => esc_html__('Arrondir pour les réductions', 'swiss-5-cent-rounding'),
                'css' => 'width:600px;height:200px',
                'type' => 'checkbox',
                'default' => 'yes',
                'desc' => esc_html__('Cocher pour arrondir les promos à 5 centimes ou 0 centime', 'swiss-5-cent-rounding'),
                'id' => 'sr_discount_price_rounding',
            ],
            'sr_round_vat_amounts' => [
                'name' => esc_html__('Arrondir la TVA', 'swiss-5-cent-rounding'),
                'css' => 'width:600px;height:200px',
                'type' => 'checkbox',
                'default' => 'yes',
                'desc' => esc_html__('Cocher pour arrondir la TVA à 5 centimes ou 0 centime', 'swiss-5-cent-rounding'),
                'id' => 'sr_vat_price_rounding',
            ],
            'sr_round_vat_shipping' => [
                'name' => esc_html__('Arrondir la TVA de livraison', 'swiss-5-cent-rounding'),
                'css' => 'width:600px;height:200px',
                'type' => 'checkbox',
                'default' => 'yes',
                'desc' => esc_html__('Cocher pour arrondir la TVA à 5 centimes ou 0 centime pour la livraison', 'swiss-5-cent-rounding'),
                'id' => 'sr_vat_price_rounding_shipping',
            ],


            'section_end' => [
                'type' => 'sectionend',
                'id' => 'swiss_rounding_settings_section_end',
            ],
        ];
    }
}