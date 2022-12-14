<?php

namespace App\Helpers;

use App\Language;

class LanguageHelper
{
    private static $language = null;
    private static $default = null;
    private static $user_lang_slug = null;
    private static $default_slug = null;
    private static $user_lang = null;
    private static $all_language = null;

    public function __construct()
    {
        self::lang_instance();
    }

    private static function lang_instance()
    {
        if (self::$language === null) {
            self::$language = new Language();
        }
        return self::$language;
    }

    public static function user_lang()
    {
        if (self::$user_lang === null) {
            $session_lang = session()->get('lang');
            if ( !empty($session_lang) && $session_lang !== self::default_slug()){
                self::$user_lang = self::lang_instance()->where('slug',session()->get('lang'))->first();
            }else{
                self::$user_lang = self::default();
            }

        }
        return self::$user_lang;
    }

    public static function default()
    {
        if (self::$default === null) {
            $default = self::lang_instance()->where('default', '1')->first();
            self::$default = $default;
        }
        return self::$default;
    }

    public static function default_slug()
    {
        if (self::$default_slug === null) {
            $default = self::lang_instance()->where('default', '1')->first();
            self::$default_slug = $default->slug;
        }
        return self::$default_slug;
    }
    public static function default_dir()
    {
        if (self::$default === null) {
            $default = self::lang_instance()->where('default', '1')->first();
            self::$default = $default;
        }
        return self::$default->direction;
    }
    public static function user_lang_slug(){
        if (self::$user_lang_slug === null) {
            $default = self::lang_instance()->where('default', '1')->first();
            self::$user_lang_slug = session()->get('lang') ?? $default->slug;
        }
        return self::$user_lang_slug;
    }
    public static function user_lang_dir()
    {
        return self::user_lang()->direction;
    }

    public static function all_languages(string $type = 'publish')
    {
        if (self::$all_language === null) {
            self::$all_language = self::lang_instance()->where(['status' => 'publish'])->get();
        }
        return self::$all_language;
    }

    public static function getAllLanguages()
    {
        return [
            [
                "value" => "af",
                "lang" => "af",
                "title" => "Afrikaans"
            ],
            [
                "value" => "ar",
                "lang" => "ar",
                "title" => "??????????????"
            ],
            [
                "value" => "ary",
                "lang" => "ar",
                "title" => "?????????????? ????????????????"
            ],
            [
                "value" => "as",
                "lang" => "as",
                "title" => "?????????????????????"
            ],
            [
                "value" => "az",
                "lang" => "az",
                "title" => "Az??rbaycan dili"
            ],
            [
                "value" => "azb",
                "lang" => "az",
                "title" => "?????????? ??????????????????"
            ],
            [
                "value" => "bel",
                "lang" => "be",
                "title" => "???????????????????? ????????"
            ],
            [
                "value" => "bg_BG",
                "lang" => "bg",
                "title" => "??????????????????"
            ],
            [
                "value" => "bn_BD",
                "lang" => "bn",
                "title" => "???????????????"
            ],
            [
                "value" => "bo",
                "lang" => "bo",
                "title" => "?????????????????????"
            ],
            [
                "value" => "bs_BA",
                "lang" => "bs",
                "title" => "Bosanski"
            ],
            [
                "value" => "ca",
                "lang" => "ca",
                "title" => "Catal??"
            ],
            [
                "value" => "ceb",
                "lang" => "ceb",
                "title" => "Cebuano"
            ],
            [
                "value" => "cs_CZ",
                "lang" => "cs",
                "title" => "??e??tina"
            ],
            [
                "value" => "cy",
                "lang" => "cy",
                "title" => "Cymraeg"
            ],
            [
                "value" => "da_DK",
                "lang" => "da",
                "title" => "Dansk"
            ],
            [
                "value" => "de_CH",
                "lang" => "de",
                "title" => "Deutsch (Schweiz)"
            ],
            [
                "value" => "de_AT",
                "lang" => "de",
                "title" => "Deutsch (??sterreich)"
            ],
            [
                "value" => "de_CH_informal",
                "lang" => "de",
                "title" => "Deutsch (Schweiz, Du)"
            ],
            [
                "value" => "de_DE",
                "lang" => "de",
                "title" => "Deutsch"
            ],
            [
                "value" => "de_DE_formal",
                "lang" => "de",
                "title" => "Deutsch (Sie)"
            ],
            [
                "value" => "dsb",
                "lang" => "dsb",
                "title" => "Dolnoserb????ina"
            ],
            [
                "value" => "dzo",
                "lang" => "dz",
                "title" => "??????????????????"
            ],
            [
                "value" => "el",
                "lang" => "el",
                "title" => "????????????????"
            ],
            [
                "value" => "en_US",
                "lang" => "en",
                "title" => "English (USA)"
            ],
            [
                "value" => "en_AU",
                "lang" => "en",
                "title" => "English (Australia)"
            ],
            [
                "value" => "en_GB",
                "lang" => "en",
                "title" => "English (UK)"
            ],
            [
                "value" => "en_CA",
                "lang" => "en",
                "title" => "English (Canada)"
            ],
            [
                "value" => "en_ZA",
                "lang" => "en",
                "title" => "English (South Africa)"
            ],
            [
                "value" => "en_NZ",
                "lang" => "en",
                "title" => "English (New Zealand)"
            ],
            [
                "value" => "eo",
                "lang" => "eo",
                "title" => "Esperanto"
            ],
            [
                "value" => "es_AR",
                "lang" => "es",
                "title" => "Espa??ol de Argentina"
            ],
            [
                "value" => "es_EC",
                "lang" => "es",
                "title" => "Espa??ol de Ecuador"
            ],
            [
                "value" => "es_MX",
                "lang" => "es",
                "title" => "Espa??ol de M??xico"
            ],
            [
                "value" => "es_ES",
                "lang" => "es",
                "title" => "Espa??ol"
            ],
            [
                "value" => "es_VE",
                "lang" => "es",
                "title" => "Espa??ol de Venezuela"
            ],
            [
                "value" => "es_CO",
                "lang" => "es",
                "title" => "Espa??ol de Colombia"
            ],
            [
                "value" => "es_CR",
                "lang" => "es",
                "title" => "Espa??ol de Costa Rica"
            ],
            [
                "value" => "es_PE",
                "lang" => "es",
                "title" => "Espa??ol de Per??"
            ],
            [
                "value" => "es_PR",
                "lang" => "es",
                "title" => "Espa??ol de Puerto Rico"
            ],
            [
                "value" => "es_UY",
                "lang" => "es",
                "title" => "Espa??ol de Uruguay"
            ],
            [
                "value" => "es_GT",
                "lang" => "es",
                "title" => "Espa??ol de Guatemala"
            ],
            [
                "value" => "es_CL",
                "lang" => "es",
                "title" => "Espa??ol de Chile"
            ],
            [
                "value" => "et",
                "lang" => "et",
                "title" => "Eesti"
            ],
            [
                "value" => "eu",
                "lang" => "eu",
                "title" => "Euskara"
            ],
            [
                "value" => "fa_IR",
                "lang" => "fa",
                "title" => "??????????"
            ],
            [
                "value" => "fa_AF",
                "lang" => "fa",
                "title" => "(?????????? (??????????????????"
            ],
            [
                "value" => "fi",
                "lang" => "fi",
                "title" => "Suomi"
            ],
            [
                "value" => "fr_FR",
                "lang" => "fr",
                "title" => "Fran??ais"
            ],
            [
                "value" => "fr_BE",
                "lang" => "fr",
                "title" => "Fran??ais de Belgique"
            ],
            [
                "value" => "fr_CA",
                "lang" => "fr",
                "title" => "Fran??ais du Canada"
            ],
            [
                "value" => "fur",
                "lang" => "fur",
                "title" => "Friulian"
            ],
            [
                "value" => "gd",
                "lang" => "gd",
                "title" => "G??idhlig"
            ],
            [
                "value" => "gl_ES",
                "lang" => "gl",
                "title" => "Galego"
            ],
            [
                "value" => "gu",
                "lang" => "gu",
                "title" => "?????????????????????"
            ],
            [
                "value" => "haz",
                "lang" => "haz",
                "title" => "?????????? ????"
            ],
            [
                "value" => "he_IL",
                "lang" => "he",
                "title" => "????????????????"
            ],
            [
                "value" => "hi_IN",
                "lang" => "hi",
                "title" => "??????????????????"
            ],
            [
                "value" => "hr",
                "lang" => "hr",
                "title" => "Hrvatski"
            ],
            [
                "value" => "hsb",
                "lang" => "hsb",
                "title" => "Hornjoserb????ina"
            ],
            [
                "value" => "hu_HU",
                "lang" => "hu",
                "title" => "Magyar"
            ],
            [
                "value" => "hy",
                "lang" => "hy",
                "title" => "??????????????"
            ],
            [
                "value" => "id_ID",
                "lang" => "id",
                "title" => "Bahasa Indonesia"
            ],
            [
                "value" => "is_IS",
                "lang" => "is",
                "title" => "??slenska"
            ],
            [
                "value" => "it_IT",
                "lang" => "it",
                "title" => "Italiano"
            ],
            [
                "value" => "ja",
                "lang" => "ja",
                "title" => "?????????"
            ],
            [
                "value" => "jv_ID",
                "lang" => "jv",
                "title" => "Basa Jawa"
            ],
            [
                "value" => "ka_GE",
                "lang" => "ka",
                "title" => "?????????????????????"
            ],
            [
                "value" => "kab",
                "lang" => "kab",
                "title" => "Taqbaylit"
            ],
            [
                "value" => "kk",
                "lang" => "kk",
                "title" => "?????????? ????????"
            ],
            [
                "value" => "km",
                "lang" => "km",
                "title" => "???????????????????????????"
            ],
            [
                "value" => "kn",
                "lang" => "kn",
                "title" => "???????????????"
            ],
            [
                "value" => "ko_KR",
                "lang" => "ko",
                "title" => "?????????"
            ],
            [
                "value" => "ckb",
                "lang" => "ku",
                "title" => "?????????????"
            ],
            [
                "value" => "lo",
                "lang" => "lo",
                "title" => "?????????????????????"
            ],
            [
                "value" => "lt_LT",
                "lang" => "lt",
                "title" => "Lietuvi?? kalba"
            ],
            [
                "value" => "lv",
                "lang" => "lv",
                "title" => "Latvie??u valoda"
            ],
            [
                "value" => "mk_MK",
                "lang" => "mk",
                "title" => "???????????????????? ??????????"
            ],
            [
                "value" => "ml_IN",
                "lang" => "ml",
                "title" => "??????????????????"
            ],
            [
                "value" => "mn",
                "lang" => "mn",
                "title" => "????????????"
            ],
            [
                "value" => "mr",
                "lang" => "mr",
                "title" => "???????????????"
            ],
            [
                "value" => "ms_MY",
                "lang" => "ms",
                "title" => "Bahasa Melayu"
            ],
            [
                "value" => "my_MM",
                "lang" => "my",
                "title" => "???????????????"
            ],
            [
                "value" => "nb_NO",
                "lang" => "nb",
                "title" => "Norsk bokm??l"
            ],
            [
                "value" => "ne_NP",
                "lang" => "ne",
                "title" => "??????????????????"
            ],
            [
                "value" => "nl_NL",
                "lang" => "nl",
                "title" => "Nederlands"
            ],
            [
                "value" => "nl_BE",
                "lang" => "nl",
                "title" => "Nederlands (Belgi??)"
            ],
            [
                "value" => "nl_NL_formal",
                "lang" => "nl",
                "title" => "Nederlands (Formeel)"
            ],
            [
                "value" => "nn_NO",
                "lang" => "nn",
                "title" => "Norsk nynorsk"
            ],
            [
                "value" => "oci",
                "lang" => "oc",
                "title" => "Occitan"
            ],
            [
                "value" => "pa_IN",
                "lang" => "pa",
                "title" => "??????????????????"
            ],
            [
                "value" => "pl_PL",
                "lang" => "pl",
                "title" => "Polski"
            ],
            [
                "value" => "ps",
                "lang" => "ps",
                "title" => "????????"
            ],
            [
                "value" => "pt_BR",
                "lang" => "pt",
                "title" => "Portugu??s do Brasil"
            ],
            [
                "value" => "pt_PT_ao90",
                "lang" => "pt",
                "title" => "Portugu??s (AO90)"
            ],
            [
                "value" => "pt_AO",
                "lang" => "pt",
                "title" => "Portugu??s de Angola"
            ],
            [
                "value" => "pt_PT",
                "lang" => "pt",
                "title" => "Portugu??s"
            ],
            [
                "value" => "rhg",
                "lang" => "rhg",
                "title" => "Ru??inga"
            ],
            [
                "value" => "ro_RO",
                "lang" => "ro",
                "title" => "Rom??n??"
            ],
            [
                "value" => "ru_RU",
                "lang" => "ru",
                "title" => "??????????????"
            ],
            [
                "value" => "sah",
                "lang" => "sah",
                "title" => "??????????????"
            ],
            [
                "value" => "snd",
                "lang" => "sd",
                "title" => "????????"
            ],
            [
                "value" => "si_LK",
                "lang" => "si",
                "title" => "???????????????"
            ],
            [
                "value" => "sk_SK",
                "lang" => "sk",
                "title" => "Sloven??ina"
            ],
            [
                "value" => "skr",
                "lang" => "skr",
                "title" => "??????????????"
            ],
            [
                "value" => "sl_SI",
                "lang" => "sl",
                "title" => "Sloven????ina"
            ],
            [
                "value" => "sq",
                "lang" => "sq",
                "title" => "Shqip"
            ],
            [
                "value" => "sr_RS",
                "lang" => "sr",
                "title" => "???????????? ??????????"
            ],
            [
                "value" => "sv_SE",
                "lang" => "sv",
                "title" => "Svenska"
            ],
            [
                "value" => "sw",
                "lang" => "sw",
                "title" => "Kiswahili"
            ],
            [
                "value" => "szl",
                "lang" => "szl",
                "title" => "??l??nsk?? g??dka"
            ],
            [
                "value" => "ta_IN",
                "lang" => "ta",
                "title" => "???????????????"
            ],
            [
                "value" => "ta_LK",
                "lang" => "ta",
                "title" => "???????????????"
            ],
            [
                "value" => "te",
                "lang" => "te",
                "title" => "??????????????????"
            ],
            [
                "value" => "th",
                "lang" => "th",
                "title" => "?????????"
            ],
            [
                "value" => "tl",
                "lang" => "tl",
                "title" => "Tagalog"
            ],
            [
                "value" => "tr_TR",
                "lang" => "tr",
                "title" => "T??rk??e"
            ],
            [
                "value" => "tt_RU",
                "lang" => "tt",
                "title" => "?????????? ????????"
            ],
            [
                "value" => "tah",
                "lang" => "ty",
                "title" => "Reo Tahiti"
            ],
            [
                "value" => "ug_CN",
                "lang" => "ug",
                "title" => "????????????????"
            ],
            [
                "value" => "uk",
                "lang" => "uk",
                "title" => "????????????????????"
            ],
            [
                "value" => "ur",
                "lang" => "ur",
                "title" => "????????"
            ],
            [
                "value" => "uz_UZ",
                "lang" => "uz",
                "title" => "O???zbekcha"
            ],
            [
                "value" => "vi",
                "lang" => "vi",
                "title" => "Ti???ng Vi???t"
            ],
            [
                "value" => "zh_TW",
                "lang" => "zh",
                "title" => "????????????"
            ],
            [
                "value" => "zh_HK",
                "lang" => "zh",
                "title" => "???????????????"
            ],
            [
                "value" => "zh_CN",
                "lang" => "zh",
                "title" => "????????????"
            ]
        ];
    }
}