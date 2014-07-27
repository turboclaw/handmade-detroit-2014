        <footer role="contentinfo" class="cf">
            <small>© 2014, <a href="http://handmadedetroit.com">Handmade Detroit</a></small>
            <ul class="social">
                <li><a href="https://www.facebook.com/handmadedetroit" data-icon="facebook"><span>Facebook</span></a></li>
                <li><a href="https://twitter.com/handmadedetroit" data-icon="twitter"><span>Twitter</span></a></li>
                <li><a href="https://www.flickr.com/photos/hd_ducf/" data-icon="flickr"><span>Flickr</span></a></li>
                <li><a href="https://www.etsy.com/shop/handmadedetroit" data-icon="etsy"><span>Etsy</span></a></li>
                <li><a href="http://feeds2.feedburner.com/handmadedetroit/rss" data-icon="rss"><span>RSS</span></a></li>
            </ul>
        </footer>
        <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
        try {
        <?php 
        global $currentsite;
        if ($currentsite == "handmade-detroit") { ?>
        var pageTracker = _gat._getTracker("UA-7347937-1");
        <?php } elseif ($currentsite == "ducf") { ?>
        var pageTracker = _gat._getTracker("UA-470288-3");
        <?php } ?>
        pageTracker._trackPageview();
        } catch(err) {}</script>
        <?php wp_footer(); ?>
    </body>
</html>