@extends('app')

@section('content')

        <!-- 6.3 home section -->
<section class="home-section is-visible">
    <!-- content container -->
    <div class="content-container centering-y col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
        <h1 class="home-title animated entrance">LEFT <span class="highlight">RITE</span></h1>

        <!-- wordsrotator container -->
        <div class="wordsrotator-container animated entrance">
            <h3 id="wordsrotator">empowering Philadelphia's dance music community</h3>
        </div>
        <!-- end wordsrotator container -->

        <!-- social media link (this social media links will be visible only on home section) -->
        <div class="social-media-container col-lg-12 col-xs-12">
            <a href="https://www.facebook.com/LEFTRITEPHL/" class="fb-link animated entrance" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/LEFTRITEphl" class="twitter-link animated entrance" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/leftritephl/" class="twitter-link animated entrance" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://soundcloud.com/leftrite" class="behance-link animated entrance" target="_blank"><i class="fa fa-soundcloud"></i></a>
            <a href="https://www.mixcloud.com/LEFTRITEphl/" class="dribbble-link animated entrance" target="_blank"><i class="fa fa-mixcloud"></i></a>
            <a href="http://mixlr.com/leftritephl/" class="dribbble-link animated entrance" target="_blank"><i class="fa fa-music"></i></a>
        </div>
        <!-- end social media link -->
    </div>
    <!-- end content container -->

    <!-- keyboard guide (WILL BE HIDDEN ON EXTRA SMALL DEVICES) -->
    <div class="keyboard-guide centering-x animated entrance visible-lg">
        <img src="{{ Theme::url('img/guide.png') }}" alt="guide" class="guide-image" />
    </div>
    <!-- end keyboard guide -->
</section>
<!-- end home section -->

<!-- 6.4 about section -->
<section class="about-section is-hidden-right">
    <!-- content container -->
    <div class="content-container centering-y col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <!-- left side -->
        <div class="left-side col-lg-6 col-md-6 col-xs-12">
            <h2 class="section-title">about us</h2>

            <!-- 6.4.1 company description -->
            <p class="about-desc">
                LEFT RITE is a nightlife collective comprised of prolifically creative individuals who share the mutual goal of empowering Philadelphia's dance music community to gather in a spirit of inclusion, celebration, and self-expression. We've been in love with this process since 2006, with a track record of producing and promoting each event of the now west-coast-based Oddcake crew.
            </p>

            <!-- benefit -->
            <!--
            <ul class="benefit">
                <li><i class="pe-7s-diamond centering-y"></i> Clean & Responsive Design</li>
                <li><i class="pe-7s-diamond centering-y"></i> 24 Hours Customer Support</li>
                <li><i class="pe-7s-diamond centering-y"></i> Mailchimp Newsletter Integration</li>
            </ul>
            -->
            <!-- end benefit -->
        </div>
        <!-- end left side -->

        <!-- right side -->

        <div class="right-side col-lg-6 col-md-6 col-xs-12 centering-y">
            <!-- 6.4.2 service container -->
            {{--  <div class="service-container col-lg-12 col-xs-12 owl-carousel">
                  <!-- service 1 -->
                  <div class="service col-lg-12 col-xs-12">
                      <div class="icon-container">
                          <i class="pe-7s-vector"></i>
                      </div>
                      <div class="col-lg-6 col-xs-12 centering-y text-container">
                          <h4><span data-letters="web design">web design</span></h4>
                          <p class="service-desc">Nam liber tempor cum soluta nobis eleifend option</p>
                      </div>
                  </div>
                  <!-- end service 1 -->

                  <!-- service 2 -->
                  <div class="service col-lg-12 col-xs-12">
                      <div class="icon-container">
                          <i class="pe-7s-medal"></i>
                      </div>
                      <div class="col-lg-6 col-xs-12 centering-y text-container">
                          <h4><span data-letters="branding">branding</span></h4>
                          <p class="service-desc">Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
                      </div>
                  </div>
                  <!-- end service 2 -->

                  <!-- service 3 -->
                  <div class="service col-lg-12 col-xs-12">
                      <div class="icon-container">
                          <i class="pe-7s-plugin"></i>
                      </div>
                      <div class="col-lg-6 col-xs-12 centering-y text-container">
                          <h4><span data-letters="marketing">marketing</span></h4>
                          <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit in vulputate.</p>
                      </div>
                  </div>
                  <!-- end service 3 -->
              </div>--}}
                    <!-- end service container -->
        </div>

        <!-- end right side -->
    </div>
    <!-- end content container -->
</section>
<!-- end about section -->

<!-- 6.5 subscribe section -->
<section class="subscribe-section is-hidden-right">
    <!-- content container -->
    <div class="content-container centering-y col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <!-- left side -->
        <div class="left-side col-lg-6 col-md-6 col-xs-12">
            <h2 class="section-title">subscribe</h2>
            <p class="subscribe-desc">
                Enter your email below to join LEFT RITE's mailinglist. This will keep you in the loop with our events.
            </p>

            <!-- 6.5.1 subscribe form container -->
            <div class="subscribe-form-container">
                <form class="subscribe-form" method="get" enctype="multipart/form-data">
                    <!-- input container -->
                    <div class="input-container col-lg-12">
                        <input id="FNAME" type="text" name="FNAME" autocomplete="off" class="subscribe-email" placeholder="first name" />
                        <input id="LNAME" type="text" name="LNAME" autocomplete="off" class="subscribe-email" placeholder="last name" />
                        <input id="email_subscribe" type="text" name="EMAIL" autocomplete="off" class="subscribe-email" placeholder="email" />

                        <!-- this div is for form focus effect -->
                        <div class="thin-line"></div>
                        <!-- this div is for form focus effect -->

                        {{--<span class="email-icon"></span>--}}

                        <button type="submit" class="button-regular submit-button" data-text="submit">submit</button>
                    </div>
                    <!-- end input container -->
                </form>

                <!-- notif container (needed for showing the notifications)-->
                <div class="subscribe-notif"></div>
                <!-- end notif container -->
            </div>
            <!-- end subscribe form container -->
        </div>
        <!-- end left side -->

        <!-- right side -->
        <div class="right-side col-lg-6 col-md-6 col-xs-12 centering-y">
            <!-- 6.5.2 twitter feed container
        <!--<div class="twitter-feed">

        </div>-->
            <!-- end twitter feed container -->
        </div>
        <!-- end right side -->
    </div>
    <!-- end content container -->
</section>
<!-- end subscribe section -->

<!-- 6.6 events section -->
<section class="events-section is-hidden-right">
    <!-- content container -->
    <div class="content-container centering-y col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <!-- left side -->
        <div class="left-side col-lg-6 col-md-6 col-xs-12">
            <h2 class="section-title">events</h2>
            <p class="events-desc">
                Here are LEFT RITE's current events and events we are involved with.
            </p>
        </div>
        <!-- end left side -->

        <!-- right side -->
        <div class="right-side col-lg-6 col-md-6 col-xs-12 centering-y">
            <!-- 6.6.1 events container -->
            <div class="events-container col-lg-12 col-md-12 col-xs-12 owl-carousel">
                @foreach($events as $event)
                    <div class="events">
                        <!-- photo container -->
                        <div class="photo-container">
                            <img alt="{{$event->title}}" src="{{config('attendize.cdn_url_user_assets').'/'.$event->images->first()['image_path']}}" property="image">
                        </div>
                        <!-- end photo container -->

                        <!-- text container -->
                        <div class="text-container">
                            <span class="date">{{ $event->start_date->format('D d M h:i A') }}</span>
                            <h4><span class="title" style="color: white;">{{ $event->title }}</span></h4>

                            <!-- link button -->
                            <a href="{{ $event->facebook_event_url }}" class="link-button" target="_blank"><i class="pe-7s-link"></i></a>
                            <!-- end link button -->
                        </div>
                        <!-- end text container -->
                    </div>
                    <!-- end events 3 -->
                @endforeach
            </div>

            <!-- end events container -->
        </div>
        <!-- end right side -->

        <!-- end content container -->
</section>
<!-- end events section -->

<!-- 6.7 contact section -->
<section class="contact-section is-hidden-right">
    <!-- content container -->
    <div class="content-container centering-y col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <!-- left side -->
        <div class="left-side col-lg-6 col-md-6 col-xs-12">
            <h2 class="section-title">contact</h2>
            <p class="contact-desc">
                If you have something on your mind, why not contact us anytime.
            </p>

            <!-- 6.7.1 contact form container -->
            <div class="contact-form-container">
                <form class="contact-form" enctype="multipart/form-data">
                    <!-- left side -->
                    <div class="col-lg-6 col-md-6 col-xs-12 left-side">
                        <div class="form-row">
                            <input type="text" class="contact-name" id="name_contact" name="name" placeholder="insert your name" />
                            <span class="user-icon"></span>

                            <!-- this div is for form focus effect -->
                            <div class="thin-line"></div>
                            <!-- this div is for form focus effect -->
                        </div>
                    </div>
                    <!-- end left side -->

                    <!-- right side -->
                    <div class="col-lg-6 col-md-6 col-xs-12 right-side">
                        <div class="form-row">
                            <input type="email" class="contact-email" id="email_contact" name="email" autocomplete="off" placeholder="insert your email address" />
                            <span class="email-icon"></span>

                            <!-- this div is for form focus effect -->
                            <div class="thin-line"></div>
                            <!-- this div is for form focus effect -->
                        </div>
                    </div>
                    <!-- end right side -->

                    <div class="form-row">
                        <textarea class="contact-message" id="message_contact" name="message" placeholder="insert your message"></textarea>
                        <span class="note-icon"></span>

                        <!-- this div is for form focus effect -->
                        <div class="thin-line"></div>
                        <!-- this div is for form focus effect -->
                    </div>

                    <!-- notif container (to show success or error notif) -->
                    <div class="contact-notif col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    </div>
                    <!-- end notif container -->

                    <!-- submit button -->
                    <div class="form-row submit-button">
                        <button class="button-regular submit-button" id="contactUsSubmit" data-text="send message">send message</button>
                    </div>
                    <div ><p class="subscribe-desc" id="contactResult"></p></div>
                    <!-- submit button -->
                </form>
            </div>
            <!-- end contact form container -->
        </div>
        <!-- end left side -->

        <!-- right side -->
        <div class="right-side col-lg-6 col-md-6 col-xs-12 centering-y">
            <!-- 6.7.2 contact details -->
            <ul class="contact-details">
                <!-- address -->
                <li class="detail">
                    <div class="text-container">
                        <p>Philadelphia, Pennsylvania</p>
                    </div>
                    <div class="icon-container"><i class="pe-7s-home"></i></div>
                </li>
                <!-- end address -->

                <!-- phone -->
                <!-- <li class="detail">
                     <div class="text-container">
                         <p>+62 71 6891 008</p>
                     </div>
                     <div class="icon-container"><i class="pe-7s-call"></i></div>
                 </li>-->
                <!-- end phone -->

                <!-- email -->
                <li class="detail">
                    <div class="text-container">
                        <p>contact@leftrite.com</p>
                    </div>
                    <div class="icon-container"><i class="pe-7s-mail-open"></i></div>
                </li>
                <!-- end email -->
            </ul>
            <!-- end contact details -->

            <!-- locate us -->
            <!--<div class="contact-details">
                <a href="#" class="detail locate-us">
                    <div class="text-container">
                        <p>locate us</p>
                    </div>
                    <div class="icon-container"><i class="pe-7s-map-2"></i></div>
                </a>
            </div>-->
            <!-- end locate us -->
        </div>
        <!-- end right side -->
    </div>
    <!-- end content container -->
</section>
<!-- end contact section -->
</div>
<!-- end page container -->

<!-- 7.0 page container map -->
<div class="page-container-map is-hidden">
    <!-- map background -->
    <div id="map"></div>
    <!-- end map background -->

    <!-- close button -->
    <a href="#" class="map-close-button">X</a>
    <!-- end close button -->
</div>
<!-- end page container map -->
</div>
@endsection