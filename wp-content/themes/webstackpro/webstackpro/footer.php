<?php if ( ! defined( 'ABSPATH' ) ) { exit; }?>
            <?php if(io_get_option('ad_footer_s')) echo '<div class="container ad ad-footer">' . stripslashes( io_get_option('ad_footer') ) . '</div>'; ?> 
            <footer class="main-footer footer-type-1 text-xs">
                <div id="footer-tools" class="d-flex flex-column">
                    <a href="javascript:" id="go-to-up" class="btn rounded-circle go-up m-1" rel="go-top">
                        <i class="iconfont icon-to-up"></i>
                    </a>
                    <?php if( in_array("tool",io_get_option('search_position')) ){ ?>
                    <a href="javascript:" data-toggle="modal" data-target="#search-modal" class="btn rounded-circle m-1" rel="search">
                        <i class="iconfont icon-search"></i>
                    </a>
                    <?php } ?>
                    <?php if(io_get_option('weather') && io_get_option('weather_location')=='footer'){ ?>
                    <!-- 天气  -->
                    <div class="btn rounded-circle weather m-1">
                        <div id="he-plugin-simple" style="display: contents;"></div>
                        <script>WIDGET = {CONFIG: {"modules": "02","background": 5,"tmpColor": "888","tmpSize": 14,"cityColor": "888","citySize": 14,"aqiSize": 14,"weatherIconSize": 24,"alertIconSize": 18,"padding": "7px 2px 7px 2px","shadow": "1","language": "auto","borderRadius": 5,"fixed": "false","vertical": "middle","horizontal": "left","key": "a922adf8928b4ac1ae7a31ae7375e191"}}</script>
                        <script src="https://widget.heweather.net/simple/static/js/he-simple-common.js?v=1.1"></script>
                    </div>
                    <!-- 天气 end -->
                    <?php } ?>
                    <a href="javascript:" id="switch-mode" class="btn rounded-circle switch-dark-mode m-1" data-toggle="tooltip" data-placement="left" title="夜间模式">
                        <i class="mode-ico iconfont icon-light"></i>
                    </a>
                </div>
                <div class="footer-inner">
                    <div class="footer-text">
                        <?php if(io_get_option('footer_copyright')) : 
                           echo io_get_option('footer_copyright');
                        ?>
                        <?php else: ?>
                        Copyright © <?php echo date('Y') ?> <?php bloginfo('name'); ?> <?php if(io_get_option('icp')) echo '<a href="http://www.beian.miit.gov.cn/" target="_blank" rel="link noopener">' . io_get_option('icp') . '</a>'?>
                        &nbsp;&nbsp;技术支持 by <a href="https://www.cinui.com" target="_blank"><strong>CINUI 原创设计</strong></a>
                        <?php endif; ?>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php if( in_array("top",io_get_option('search_position')) || in_array("tool",io_get_option('search_position')) ){ ?>  
<div class="modal fade search-modal" id="search-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">  
            <div class="modal-body">
                <?php get_template_part( 'templates/tools','searchm' ); ?>  
                <div class="px-1 mb-3"><i class="text-xl iconfont icon-hot mr-1" style="color:#f1404b;"></i><span class="h6">热门推荐： </span></div>
                <div class="mb-3">
                    <?php wp_menu("search_menu") ?>
                </div>
            </div>  
            <div style="position: absolute;bottom: -40px;width: 100%;text-align: center;"><a href="javascript:" data-dismiss="modal"><i class="iconfont icon-close-circle icon-2x" style="color: #fff;"></i></a></div>
        </div>
    </div>  
</div>
<?php } ?>
<?php wp_footer(); ?>
<?php if (is_home() || is_front_page()): ?>
    <script type="text/javascript">
    $(document).on('click','a.smooth',function(ev) {
        ev.preventDefault();
        if($('#sidebar').hasClass('show')){
            $('#sidebar').modal('toggle');
        }
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - 90
        }, {
            duration: 500,
            easing: "swing"
        });
        if($(this).hasClass('go-search-btn')){
            $('#search-text').focus();
        }
        <?php if(io_get_option("tab_type")) { ?>
        var menu =  $("a"+$(this).attr("href"));
        menu.click();
        toTarget(menu.parent().parent());
        <?php } ?>
    });
    </script>
<?php endif; ?>
<!-- 自定义代码 -->
<?php echo io_get_option('code_2_footer');?>
<!-- end 自定义代码 -->
</body>
</html>
