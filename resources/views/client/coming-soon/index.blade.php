@extends('client.layouts.app')
@section('content')
    <section class="sec-incen bg12">
        <div class="container how-height1">
            <div class="row">
                <div class="col-sm-10 order-md-2 col-md-6 m-rl-auto">
                    <div class="h-full flex-m m-l--30 m-rl-0-md p-tb-80">
                        <div class="w-full">
                            <div class="size-a-1 flex-col-l p-b-39">
                                <div class="txt-m-201 cl10 how-pos1-parent m-b-14">
                                    Special Product
                                    <div class="how-pos1">
                                        <img src="client/new/images/icons/symbol-02.png" alt="IMG">
                                    </div>
                                </div>
                                <h3 class="txt-l-101 cl3 respon1">
                                    COMING SOON
                                </h3>
                            </div>
                            <div class="flex-w coutdown100 p-b-55" data-year="0" data-month="0" data-date="210"
                                 data-hours="23" data-minutes="0" data-seconds="0" data-timezone="auto">

                                <div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">
                                    <span id="timeDifferenceHours" class="txt-l-102 cl6 hours">
                                        25
                                    </span>
                                    <span class="txt-m-106 cl9">
                                        hours
                                    </span>
                                </div>
                                <div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">
                                    <span id="timeDifferenceMinutes" class="txt-l-102 cl6 minutes">
                                        56
                                    </span>
                                    <span class="txt-m-106 cl9">
                                        mins
                                    </span>
                                </div>
                                <div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">
                                    <span id="timeDifferenceSeconds" class="txt-l-102 cl6 seconds">
                                        42
                                    </span>
                                    <span class="txt-m-106 cl9">
                                        secs
                                    </span>
                                </div>
                            </div>
                            <h5 class="txt-s-121 cl6 p-b-10">
                                OUR SITE IS NOT READY YET, BUT WE ARE COMING SOON <p id="timeDifference"></p>
                            </h5>
                            <p class="txt-s-115 cl6">
                                Sign up now to our newsletter and you’ll be one of the first to know when the site is
                                ready:
                            </p>
                            <form class="flex-w flex-m h-full p-t-36 p-r-50 p-r-0-lg">
                                <input class="size-a-29 txt-s-106 cl6 plh0 p-rl-30 w-full-sm" type="text" name="email"
                                       placeholder="Your email address">
                                <button class="bg10 size-a-28 txt-s-107 cl0 p-rl-15 trans-04 hov-btn2 mt-4 mt-sm-0">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 order-md-1 col-md-6 m-rl-auto">
                    <div class="flex-m h-full p-t-38 p-r-50 p-r-0-md">
                        <div class="wrap-pic-max-s">
                            <img src="client/new/images/other-13.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Include JavaScript -->
    <script src="{{ asset('custom/time-difference.js') }}"></script>
@endsection
