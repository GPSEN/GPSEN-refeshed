<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
?>

    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />

    <meta name="msvalidate.01" content="D7CF9F6C876492ABF63E649730931979" />

    <title><?php woo_title(); ?></title>
    <?php woo_meta(); ?>

    <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
    <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">

    <?php wp_head(); ?>
    <?php woo_head(); ?>

    <!--Google analytics-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
           m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68540774-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>
<body <?php body_class(); ?>>

    <?php woo_top(); ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

<div id="wrapper">
    <div id="inner-wrapper">
        <?php woo_header_before(); ?>

        <header id="header" class="col-full">
            <div id="nomadHeader">
                <div class="floatLeft headerLogo">
                    <a href="http://gpsen.org">
                        <img src="http://gpsen.org/wp-content/uploads/2015/07/logoSmall.jpg" alt="Logo for The Greater Portland Sustainability Education Network Portland Landscape with Bridge and Mt. Hood">
                    </a>
                </div>

                <div class="floatLeft headerh1">
                     <h1>Greater Portland <br>Sustainability Education Network</h1>
                     <h3>A UNU Regional Center of Expertise on Education for Sustainable Development</h3>
                </div>

                <div class="floatLeft headerSocialMediaLogin">
                     <ul>
                          <li><a href="https://twitter.com/gpsenews" target="_blank" class="twitterIcon"></a></li>
                          <li><a href="https://www.facebook.com/RCE.GreaterPortland" target="_blank" class="facebookIcon"></a></li>
                          <li><a href="https://www.linkedin.com/company/greater-portland-sustainability-education-network" target="_blank" class="linkedInIcon"></a></li>
                          <li><a href="https://www.youtube.com/channel/UChB7TwwnSa6brrrw-xYKeSA" target="_blank" class="youTubeIcon"></a></li>

                     </ul>
                     <!--google translate-->
                     <div id="google_translate_element"></div>

                     <script type="text/javascript">
                          function googleTranslateElementInit() {
                               new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-68540774-1'}, 'google_translate_element');
                          }
                     </script>
                     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
            </div>
        </header>
<?php woo_header_after(); ?>