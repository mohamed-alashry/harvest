<div>
    <div id="theme-page" class="page-master-holder" role="main" itemprop="mainContentOfPage">
        <div class="background-img background-img--page"></div>
        <div class="mk-main-wrapper-holder">
            <div class="theme-page-wrapper full-layout mk-grid vc_row-fluid no-padding">
                <div class="theme-content no-padding">
                    <div class="vc_row wpb_row vc_row-fluid mk-fullwidth-false attched-false">
                        <div style="" class="vc_col-sm-12 wpb_column column_container ">
                            <div class="clearboth"></div>
                            <div class="mk-shortcode mk-padding-shortcode " style="height:40px"></div>
                            <div class="clearboth"></div>
                            <h3 style="font-size: 27px;text-align:center;line-height:29px;letter-spacing:0px;color: #acce00;font-weight:bold;margin-bottom:27px; margin-top:10px; "
                                id="fancy-title-2"
                                class="mk-fancy-title responsive-align-center avantgarde-title center-align arab">
                                <span class="fancy-title-span pointed">
                                    <p>اهلا بيك في مجتمع هارفست .. دلوقتي هارفست بقت Digital Online</p>
                                </span>
                            </h3>
                            <div style="font-size: 16px;color: #14456d;font-weight:bold;margin-top:0px;margin-bottom:18px;"
                                id="fancy-title-3" class="mk-fancy-text title-box-center arab">
                                <span
                                    style="background-color:rgba(0,0,0,0); box-shadow: 8px 0 0 rgba(0,0,0,0), -8px 0 0 rgba(0,0,0,0);line-height:34px">
                                    محاضرات تفاعلية مش مجرد فيديو مسجل .. وفر وقتك وجهدك وفلوسك بدل تعب
                                    المواصلات والزحمة
                                </span>
                            </div>
                            <div class="clearboth"></div>


                            @switch($type)
                                @case(1)
                                    <livewire:placement-test.applicant />
                                @break

                                @case(2)
                                    <livewire:placement-test.vocabulary :applicant="$applicant" />
                                @break

                                @case(3)
                                    <livewire:placement-test.grammar :applicant="$applicant" />
                                @break

                                @case(4)
                                    <livewire:placement-test.reading :applicant="$applicant" />
                                @break

                                @case(5)
                                    <livewire:placement-test.listening :applicant="$applicant" />
                                @break

                                @case(6)
                                    <livewire:placement-test.writing :applicant="$applicant" />
                                @break

                                @case(7)
                                    <livewire:placement-test.thanks :applicant="$applicant" />
                                @break

                                @default

                            @endswitch




                            <div class="clearboth"></div>
                        </div>
                        <div class="clearboth"></div>
                    </div>
                </div>
                <div id="mk-footer-fixed-spacer"></div>


            </div><!-- End boxed layout -->
        </div><!-- End Theme main Wrapper -->
    </div>

</div>
