@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Liên hệ với chúng tôi</h2>
            <span class="underline center"></span>
            <p class="lead">Hân hạnh là người đồng hành với bạn.</p>
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
                                            <li>144 Xuân Thuỷ, Cầu Giấy </li>
                                            <li>Hà Nội</li>
                                            <li>Việt Nam</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li>144 Xuân Thuỷ, Cầu Giấy </li>
                                            <li>Hà Nội</li>
                                            <li>Việt Nam</li>
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
                                            <li><a href="tel:0967915305">Local: 0967915305</a></li>
                                            <li><a href="tel:0343543199">Local: 0343543199</a></li>
                                            <li><a href="fax:0437872102">Fax: 0437872102</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="tel:0967915305">Local: 0967915305</a></li>
                                            <li><a href="tel:0343543199">Local: 0343543199</a></li>
                                            <li><a href="fax:0437872102">Fax: 0437872102</a></li>
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
                                            <li>adminLibVN@gmail.com</li>
                                            <li>dotam308@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="http://www.libraria.com/">www.libraria.com </a></li>
                                            <li><a href="mailto:adminLibVN@gmail.com">adminLibVN@gmail.com</a></li>
                                            <li><a href="mailto:dotam308@gmail.com">dotam308@gmail.com</a></li>
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
                                                            action=""
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