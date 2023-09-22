@extends('client.layouts.app')

@section('content')

    <div class="banner banner-image-fit-screen">
        <div class="rev_slider slider-home-1" id="slider_1">
            <ul>
                <li class="hero_area">
                    <img class="bg-box" src="client/new/images/img/hero-bg.jpg" alt="demo" data-bgposition="center center"
                         data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">
                </li>
            </ul>
        </div>
    </div>
    <section class="sec-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container">
            <div id="rev_slider_3" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
                <ul>

                    <li data-transition="fade">

                        <img src="client/new/images/bg-slide-03.jpg" alt="IMG-BG" class="rev-slidebg">

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer1"
                             data-frames='[{"delay":1700,"speed":1500,"frame":"0","from":"y:-150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-115', '-95', '-85', '-120']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="client/new/images/icons/symbol-19.png" alt="IMG">
                        </div>

                        <h2 class="tp-caption tp-resizeme layer2"
                            data-frames='[{"delay":500,"split":"chars","splitdelay":0.05,"speed":1300,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['150', '120', '100', '80']"
                            data-lineheight="['165', '130', '110', '82']" data-color="['#fff']"
                            data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                            data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                            data-voffset="['30', '30', '20', '0']" data-width="['960','960','768','576']"
                            data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                            data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                            data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                            Farm Fresh
                        </h2>

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer3"
                             data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['190', '170', '150', '130']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="client/new/images/icons/symbol-18.png" alt="IMG">
                        </div>
                    </li>

                    <li data-transition="fade">

                        <img src="client/new/images/bg-slide-04.jpg" alt="IMG-BG" class="rev-slidebg">

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer1"
                             data-frames='[{"delay":1700,"speed":1300,"frame":"0","from":"x:300px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-115', '-95', '-85', '-120']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="client/new/images/icons/symbol-19.png" alt="IMG">
                        </div>

                        <h2 class="tp-caption tp-resizeme layer2"
                            data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['150', '120', '100', '80']"
                            data-lineheight="['165', '130', '110', '82']" data-color="['#fff']"
                            data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                            data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                            data-voffset="['30', '30', '20', '0']" data-width="['960','960','768','576']"
                            data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                            data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                            data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                            Farm Fresh
                        </h2>

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer3"
                             data-frames='[{"delay":2500,"speed":1300,"frame":"0","from":"x:-300px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['190', '170', '150', '130']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="client/new/images/icons/symbol-18.png" alt="IMG">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
