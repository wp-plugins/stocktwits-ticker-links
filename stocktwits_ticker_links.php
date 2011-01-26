<?php
/*
Plugin Name: StockTwits Ticker Links
Plugin URI: http://www.stocktwits.com/
Version: 1.0.2
Author: StockTwits
Author URI: http://stocktwits.com/
Description: Plugin links stock tickers such as $AAPL with the realtime discussions about the stock at <a href="http://www.stocktwits.com/">StockTwits.com</a>.
*/

function process_content ($content)
{
   $content =
      preg_replace (
         '/\$((?:[0-9]+(?=[a-z])|(?![0-9\.\:\_\-]))(?:[a-z0-9]|[\_\.\-\:](?![\.\_\.\-\:]))*[a-z0-9]+)/i',
         "<a href=\"http://stocktwits.com/symbol/$1\" class=\"ticker\" target=\"_blank\"><span>\$</span>$1</a>",
         $content
         );

     return $content;
}

add_filter ('the_content',       'process_content');
add_filter ('the_content_limit', 'process_content');
add_filter ('the_excerpt',       'process_content');
add_filter ('the_content_rss',   'process_content');
add_filter ('the_excerpt_rss',   'process_content');

?>
