@extends('client.layouts.app')
@section('content')
   <div>
       <section class="sec-slider">
           <div class="rev_slider_wrapper fullwidthbanner-container">
               <div id="rev_slider_4" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
                   <ul>

                       <li data-transition="fade">

                           <img src="client/new/images/img/piza.jpg" alt="IMG-BG" class="rev-slidebg">

                           <div class="tp-caption tp-resizeme layer1"
                                data-frames='[{"delay":500,"speed":1300,"frame":"0","from":"y:150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['35', '35', '30', '30']"
                                data-lineheight="['42', '42', '42', '42']" data-color="['#fff']"
                                data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                                data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                                data-voffset="['-116', '-116', '-116', '-146']" data-width="['970','960','768','576']"
                                data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                                data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                                data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                               Fast Food
                           </div>

                           <h2 class="tp-caption tp-resizeme layer2"
                               data-frames='[{"delay":1300,"speed":1300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                               data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['120', '90', '80', '70']"
                               data-lineheight="['130', '120', '100', '90']" data-color="['#fff']"
                               data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                               data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                               data-voffset="['-18', '-28', '-28', '-48']" data-width="['1100','960','768','576']"
                               data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                               data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                               data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                               Delicious
                           </h2>
                       </li>

                       <li data-transition="fade">

                           <img src="client/new/images/img/q.jpg" alt="IMG-BG" class="rev-slidebg">

                           <div class="tp-caption tp-resizeme layer1"
                                data-frames='[{"delay":1800,"speed":1300,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['35', '35', '30', '30']"
                                data-lineheight="['42', '42', '42', '42']" data-color="['#fff']"
                                data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                                data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                                data-voffset="['-116', '-116', '-116', '-146']" data-width="['970','960','768','576']"
                                data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                                data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                                data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                               natural product
                           </div>

                           <h2 class="tp-caption tp-resizeme layer2"
                               data-frames='[{"delay":500,"split":"chars","splitdelay":0.05,"speed":1300,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                               data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['120', '90', '80', '70']"
                               data-lineheight="['130', '120', '100', '90']" data-color="['#fff']"
                               data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                               data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                               data-voffset="['-18', '-28', '-28', '-48']" data-width="['1100','960','768','576']"
                               data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                               data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                               data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                               Fast Food
                           </h2>

                       </li>
                   </ul>
               </div>
           </div>
       </section>
       <div wire:key="listShopComponent" wire:ignore>
           <livewire:list-shop wire:key="listShop"></livewire:list-shop>
       </div>
   </div>
@endsection

