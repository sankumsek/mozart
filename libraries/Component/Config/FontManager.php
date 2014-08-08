<?php
/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>
 */

namespace Mozart\Component\Config;

use Mozart\Component\Form\Field\Typography;

class FontManager
{
    /**
     * @var null
     */
    private $typography = null; //values to generate google font CSS
    /**
     * @var array
     */
    private $font_groups = array();
    /**
     * @var array
     */
    private $fonts = array(); // Information that needs to be localized

    /**
     * @var ConfigFactory
     */
    private $builder;

    /**
     * @param ConfigFactory $builder
     */
    public function init(ConfigFactory $builder)
    {
        $this->builder = $builder;
    }

    public function enqueueTypographyFonts()
    {
        if (!empty( $this->typography ) && !empty( $this->typography ) && filter_var(
                $this->builder->getParam('output'),
                FILTER_VALIDATE_BOOLEAN
            )
        ) {
            $version = $this->builder->getLastSave();
            $typography = new Typography( null, null, $this->builder );

            if ($this->builder->getParam('async_typography') && !empty( $this->typography )) {
                $families = array();
                foreach ($this->typography as $key => $value) {
                    $families[] = $key;
                }

                ?>
                <style>.wf-loading *, .wf-inactive * {
                        visibility : hidden;
                    }

                    .wf-active * {
                        visibility : visible;
                    }</style>
                <script>
                    /* You can add more configuration options to webfontloader by previously defining the WebFontConfig with your options */
                    if (typeof WebFontConfig === "undefined") {
                        WebFontConfig = {};
                    }
                    WebFontConfig['google'] = {families: [<?php echo $typography->makeGoogleWebfontString( $this->typography )?>]};

                    (function () {
                        var wf = document.createElement( 'script' );
                        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.0/webfont.js';
                        wf.type = 'text/javascript';
                        wf.async = 'true';
                        var s = document.getElementsByTagName( 'script' )[0];
                        s.parentNode.insertBefore( wf, s );
                    })();
                </script>
            <?php
            } else {
                $protocol = ( !empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) ? "https:" : "http:";

                wp_register_style(
                    'redux-google-fonts',
                    $protocol . $typography->makeGoogleWebfontLink( $this->typography ),
                    '',
                    $version
                );
                wp_enqueue_style( 'redux-google-fonts' );
            }
        }
    }

    public function addLocalizeData($localizeData)
    {
        $localizeData['fonts'] = $this->fonts;

        if (isset( $this->font_groups['google'] )) {
            $localizeData['googlefonts'] = $this->font_groups['google'];
        }

        if (isset( $this->font_groups['std'] )) {
            $localizeData['stdfonts'] = $this->font_groups['std'];
        }

        if (isset( $this->font_groups['customfonts'] )) {
            $localizeData['customfonts'] = $this->font_groups['customfonts'];
        }

        return $localizeData;
    }
    /**
     * @return array
     */
    public function getFontIcons()
    {
        return array(
            'el-icon-address-book-alt',
            'el-icon-address-book',
            'el-icon-adjust-alt',
            'el-icon-adjust',
            'el-icon-adult',
            'el-icon-align-center',
            'el-icon-align-justify',
            'el-icon-align-left',
            'el-icon-align-right',
            'el-icon-arrow-down',
            'el-icon-arrow-left',
            'el-icon-arrow-right',
            'el-icon-arrow-up',
            'el-icon-asl',
            'el-icon-asterisk',
            'el-icon-backward',
            'el-icon-ban-circle',
            'el-icon-barcode',
            'el-icon-behance',
            'el-icon-bell',
            'el-icon-blind',
            'el-icon-blogger',
            'el-icon-bold',
            'el-icon-book',
            'el-icon-bookmark-empty',
            'el-icon-bookmark',
            'el-icon-braille',
            'el-icon-briefcase',
            'el-icon-broom',
            'el-icon-brush',
            'el-icon-bulb',
            'el-icon-bullhorn',
            'el-icon-calendar-sign',
            'el-icon-calendar',
            'el-icon-camera',
            'el-icon-car',
            'el-icon-caret-down',
            'el-icon-caret-left',
            'el-icon-caret-right',
            'el-icon-caret-up',
            'el-icon-cc',
            'el-icon-certificate',
            'el-icon-check-empty',
            'el-icon-check',
            'el-icon-chevron-down',
            'el-icon-chevron-left',
            'el-icon-chevron-right',
            'el-icon-chevron-up',
            'el-icon-child',
            'el-icon-circle-arrow-down',
            'el-icon-circle-arrow-left',
            'el-icon-circle-arrow-right',
            'el-icon-circle-arrow-up',
            'el-icon-cloud-alt',
            'el-icon-cloud',
            'el-icon-cog-alt',
            'el-icon-cog',
            'el-icon-cogs',
            'el-icon-comment-alt',
            'el-icon-comment',
            'el-icon-compass-alt',
            'el-icon-compass',
            'el-icon-credit-card',
            'el-icon-css',
            'el-icon-dashboard',
            'el-icon-delicious',
            'el-icon-deviantart',
            'el-icon-digg',
            'el-icon-download-alt',
            'el-icon-download',
            'el-icon-dribbble',
            'el-icon-edit',
            'el-icon-eject',
            'el-icon-envelope-alt',
            'el-icon-envelope',
            'el-icon-error-alt',
            'el-icon-error',
            'el-icon-eur',
            'el-icon-exclamation-sign',
            'el-icon-eye-close',
            'el-icon-eye-open',
            'el-icon-facebook',
            'el-icon-facetime-video',
            'el-icon-fast-backward',
            'el-icon-fast-forward',
            'el-icon-female',
            'el-icon-file-alt',
            'el-icon-file-edit-alt',
            'el-icon-file-edit',
            'el-icon-file-new-alt',
            'el-icon-file-new',
            'el-icon-file',
            'el-icon-film',
            'el-icon-filter',
            'el-icon-fire',
            'el-icon-flag-alt',
            'el-icon-flag',
            'el-icon-flickr',
            'el-icon-folder-close',
            'el-icon-folder-open',
            'el-icon-folder-sign',
            'el-icon-folder',
            'el-icon-font',
            'el-icon-fontsize',
            'el-icon-fork',
            'el-icon-forward-alt',
            'el-icon-forward',
            'el-icon-foursquare',
            'el-icon-friendfeed-rect',
            'el-icon-friendfeed',
            'el-icon-fullscreen',
            'el-icon-gbp',
            'el-icon-gift',
            'el-icon-github-text',
            'el-icon-github',
            'el-icon-glass',
            'el-icon-glasses',
            'el-icon-globe-alt',
            'el-icon-globe',
            'el-icon-googleplus',
            'el-icon-graph-alt',
            'el-icon-graph',
            'el-icon-group-alt',
            'el-icon-group',
            'el-icon-guidedog',
            'el-icon-hand-down',
            'el-icon-hand-left',
            'el-icon-hand-right',
            'el-icon-hand-up',
            'el-icon-hdd',
            'el-icon-headphones',
            'el-icon-hearing-impaired',
            'el-icon-heart-alt',
            'el-icon-heart-empty',
            'el-icon-heart',
            'el-icon-home-alt',
            'el-icon-home',
            'el-icon-hourglass',
            'el-icon-idea-alt',
            'el-icon-idea',
            'el-icon-inbox-alt',
            'el-icon-inbox-box',
            'el-icon-inbox',
            'el-icon-indent-left',
            'el-icon-indent-right',
            'el-icon-info-sign',
            'el-icon-instagram',
            'el-icon-iphone-home',
            'el-icon-italic',
            'el-icon-key',
            'el-icon-laptop-alt',
            'el-icon-laptop',
            'el-icon-lastfm',
            'el-icon-leaf',
            'el-icon-lines',
            'el-icon-link',
            'el-icon-linkedin',
            'el-icon-list-alt',
            'el-icon-list',
            'el-icon-livejournal',
            'el-icon-lock-alt',
            'el-icon-lock',
            'el-icon-magic',
            'el-icon-magnet',
            'el-icon-male',
            'el-icon-map-marker-alt',
            'el-icon-map-marker',
            'el-icon-mic-alt',
            'el-icon-mic',
            'el-icon-minus-sign',
            'el-icon-minus',
            'el-icon-move',
            'el-icon-music',
            'el-icon-myspace',
            'el-icon-network',
            'el-icon-off',
            'el-icon-ok-circle',
            'el-icon-ok-sign',
            'el-icon-ok',
            'el-icon-opensource',
            'el-icon-paper-clip-alt',
            'el-icon-paper-clip',
            'el-icon-path',
            'el-icon-pause-alt',
            'el-icon-pause',
            'el-icon-pencil-alt',
            'el-icon-pencil',
            'el-icon-person',
            'el-icon-phone-alt',
            'el-icon-phone',
            'el-icon-photo-alt',
            'el-icon-photo',
            'el-icon-picasa',
            'el-icon-picture',
            'el-icon-pinterest',
            'el-icon-plane',
            'el-icon-play-alt',
            'el-icon-play-circle',
            'el-icon-play',
            'el-icon-plus-sign',
            'el-icon-plus',
            'el-icon-podcast',
            'el-icon-print',
            'el-icon-puzzle',
            'el-icon-qrcode',
            'el-icon-question-sign',
            'el-icon-question',
            'el-icon-quotes-alt',
            'el-icon-quotes',
            'el-icon-random',
            'el-icon-record',
            'el-icon-reddit',
            'el-icon-refresh',
            'el-icon-remove-circle',
            'el-icon-remove-sign',
            'el-icon-remove',
            'el-icon-repeat-alt',
            'el-icon-repeat',
            'el-icon-resize-full',
            'el-icon-resize-horizontal',
            'el-icon-resize-small',
            'el-icon-resize-vertical',
            'el-icon-return-key',
            'el-icon-retweet',
            'el-icon-reverse-alt',
            'el-icon-road',
            'el-icon-rss',
            'el-icon-scissors',
            'el-icon-screen-alt',
            'el-icon-screen',
            'el-icon-screenshot',
            'el-icon-search-alt',
            'el-icon-search',
            'el-icon-share-alt',
            'el-icon-share',
            'el-icon-shopping-cart-sign',
            'el-icon-shopping-cart',
            'el-icon-signal',
            'el-icon-skype',
            'el-icon-slideshare',
            'el-icon-smiley-alt',
            'el-icon-smiley',
            'el-icon-soundcloud',
            'el-icon-speaker',
            'el-icon-spotify',
            'el-icon-stackoverflow',
            'el-icon-star-alt',
            'el-icon-star-empty',
            'el-icon-star',
            'el-icon-step-backward',
            'el-icon-step-forward',
            'el-icon-stop-alt',
            'el-icon-stop',
            'el-icon-stumbleupon',
            'el-icon-tag',
            'el-icon-tags',
            'el-icon-tasks',
            'el-icon-text-height',
            'el-icon-text-width',
            'el-icon-th-large',
            'el-icon-th-list',
            'el-icon-th',
            'el-icon-thumbs-down',
            'el-icon-thumbs-up',
            'el-icon-time-alt',
            'el-icon-time',
            'el-icon-tint',
            'el-icon-torso',
            'el-icon-trash-alt',
            'el-icon-trash',
            'el-icon-tumblr',
            'el-icon-twitter',
            'el-icon-universal-access',
            'el-icon-unlock-alt',
            'el-icon-unlock',
            'el-icon-upload',
            'el-icon-usd',
            'el-icon-user',
            'el-icon-viadeo',
            'el-icon-video-alt',
            'el-icon-video-chat',
            'el-icon-video',
            'el-icon-view-mode',
            'el-icon-vimeo',
            'el-icon-vkontakte',
            'el-icon-volume-down',
            'el-icon-volume-off',
            'el-icon-volume-up',
            'el-icon-w3c',
            'el-icon-warning-sign',
            'el-icon-website-alt',
            'el-icon-website',
            'el-icon-wheelchair',
            'el-icon-wordpress',
            'el-icon-wrench-alt',
            'el-icon-wrench',
            'el-icon-youtube',
            'el-icon-zoom-in',
            'el-icon-zoom-out'
        );
    }
}