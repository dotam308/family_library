@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Liên hệ với chúng tôi</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Trang chủ</a></li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<!-- Start: Contact Us Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="contact-main">
                <div class="contact-us">
                    <div class="container">
                        <div class="contact-location">
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li>121 King Street, Melbourne </li>
                                            <li>Victoria 3000 Australia</li>
                                            <li>PO Box 16122</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li>121 King Street, Melbourne </li>
                                            <li>Victoria 3000 Australia</li>
                                            <li>PO Box 16122</li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-fax" aria-hidden="true"></i>SĐT và fax</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li><a href="tel:+123-456-7890">Local: +123-456-7890</a></li>
                                            <li><a href="tel:+123-456-7890">Local: +123-456-7890</a></li>
                                            <li><a href="fax:(001)-254-7359">Fax: (001)-254-7359</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="tel:+123-456-7890">Local: +123-456-7890</a></li>
                                            <li><a href="tel:+123-456-7890">Local: +123-456-7890</a></li>
                                            <li><a href="fax:(001)-254-7359">Fax: (001)-254-7359</a></li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-fax" aria-hidden="true"></i>SĐT và fax</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-envelope" aria-hidden="true"></i>Địa chỉ Email</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li>www.libraria.com</li>
                                            <li>support@libraria.com</li>
                                            <li>info@libraria.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="http://www.libraria.com/">www.libraria.com </a></li>
                                            <li><a href="mailto:support@libraria.com">support@libraria.com</a></li>
                                            <li><a href="mailto:info@libraria.com">info@libraria.com</a></li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-envelope" aria-hidden="true"></i>Địa chỉ Email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="contact-area">
                                <div class="container">
                                    <div class="col-md-5 col-md-offset-1 border-gray-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-map bg-light margin-left">
                                                    <div class="company-map" id="map"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-gray-right">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-form bg-light margin-right">
                                                    <h2>Gửi tin nhắn đến chúng tôi</h2>
                                                    <span class="underline left"></span>
                                                    <div class="contact-fields">
                                                        <form id="contact" name="contact"
                                                            action="http://libraria.demo.presstigers.com/contact.html"
                                                            method="post">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Tên" name="first-name"
                                                                            id="first-name" size="30" value=""
                                                                            aria-required="true" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Họ đệm" name="last-name"
                                                                            id="last-name" size="30" value=""
                                                                            aria-required="true" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="email"
                                                                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                                                            placeholder="Email" name="email" id="email"
                                                                            size="30" value="" aria-required="true" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text"
                                                                            placeholder="SĐT" name="phone"
                                                                            id="phone" size="30" value=""
                                                                            aria-required="true" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control"
                                                                            placeholder="Tin nhắn" id="message"
                                                                            aria-required="true"></textarea>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-submit">
                                                                        <input class="btn btn-default"
                                                                            id="submit-contact-form" type="button"
                                                                            name="submit" value="Gửi tin" />
                                                                    </div>
                                                                </div>
                                                                <div id="success">
                                                                    <span>Đã gửi thành công! Hãy chờ phản hổi của chúng tôi!</span>
                                                                </div>

                                                                <div id="error">
                                                                    <span>Gửi tin thất bại.</span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: Contact Us Section -->
@endsection