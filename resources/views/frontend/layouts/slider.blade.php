<section id="home" class="divider">
    <div class="container-fluid p-0">
        <div id="rev_slider_home_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                <ul>
                    @foreach($sliders as $slider)
                    <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('pictures/sliders/'.$slider->image) }}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Make an Impact">
                        <img src="{{ asset('pictures/sliders/'.$slider->image) }}" alt data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" id="slide-1-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1000" data-basealign="slide" data-responsive_offset="on" style="z-index: 5;background-color:rgba(0, 0, 0, 0.35);border-color:rgba(0, 0, 0, 1.00);">
                        </div>

                        <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" id="slide-1-layer-2" data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" data-y="['top','top','top','top']" data-voffset="['120','100','70','90']" data-fontsize="['56','46','40','36']" data-lineheight="['70','60','50','45']" data-fontweight="['800','700','700','700']" data-width="['700','650','600','420']" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">Take the <span class="text-theme-colored2">world's</span> best <span class="text-theme-color-2">Consulting</span> Site.
                        </div>

                        <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" id="slide-1-layer-3" data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" data-y="['top','top','top','top']" data-voffset="['280','220','180','180']" data-fontsize="['18','18','16','13']" data-lineheight="['30','30','28','25']" data-fontweight="['600','600','600','600']" data-width="['800','650','600','420']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">We provides always our best services for our clients and always<br> try to achieve our client's trust and satisfaction.
                        </div>

                        <div class="tp-caption rs-parallaxlevel-0" id="slide-1-layer-4" data-x="['left','left','left','left']" data-hoffset="['53','53','53','30']" data-y="['top','top','top','top']" data-voffset="['360','290','260','260']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><a href="#" class="btn btn-default btn-theme-colored2 btn-xl">Read More</a> <a href="#" class="btn btn-dark btn-theme-colored2 btn-xl">Register Now</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1.00);"></div>
            </div>
        </div>

        <script data-cfasync="false" src="{{ asset('frontend/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script><script type="text/javascript">
            var tpj=jQuery;
            var revapi34;
            tpj(document).ready(function() {
                if(tpj("#rev_slider_home").revolution == undefined){
                    revslider_showDoubleJqueryError("#rev_slider_home");
                }else{
                    revapi34 = tpj("#rev_slider_home").show().revolution({
                        sliderType:"standard",
                        jsFileLocation:"js/revolution-slider/js/",
                        sliderLayout:"fullscreen",
                        dottedOverlay:"none",
                        delay:9000,
                        navigation: {
                            keyboardNavigation:"on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            onHoverStop:"on",
                            touch:{
                                touchenabled:"on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            }
                            ,
                            arrows: {
                                style:"zeus",
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                }
                            },
                            bullets: {
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                style:"metis",
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                direction:"horizontal",
                                h_align:"center",
                                v_align:"bottom",
                                h_offset:0,
                                v_offset:30,
                                space:5,
                                tmp:'<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable:true,
                            outof:"pause",
                            visible_area:"80%"
                        },
                        responsiveLevels:[1240,1024,778,480],
                        gridwidth:[1240,1024,778,480],
                        gridheight:[600,550,500,450],
                        lazyType:"none",
                        parallax: {
                            type:"scroll",
                            origo:"enterpoint",
                            speed:400,
                            levels:[5,10,15,20,25,30,35,40,45,50],
                        },
                        shadow:0,
                        spinner:"off",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        autoHeight:"off",
                        hideThumbsOnMobile:"off",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        debugMode:false,
                        fallbacks: {
                            simplifyAll:"off",
                            nextSlideOnWindowFocus:"off",
                            disableFocusListener:false,
                        }
                    });
                }
            }); /*ready*/
        </script>
    </div>
</section>
