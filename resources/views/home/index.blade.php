@section('title')
    SORSU-BC CLINIC
@endsection

<link rel="stylesheet" type="text/css" href="home/dashboard.css" />

<div class="container-fluid" style="padding: 12px 12px;">
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators3" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators3" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators3" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="img-responsive slideimg" src="img-slide/1.jpg" alt="First slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive slideimg" src="img-slide/2.jpg" alt="Second slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive slideimg" src="img-slide/3.jpg" alt="Third slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive slideimg" src="assets1/ssu1.jpg" alt="Fourth slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive slideimg" src="assets1/ssu2.jpg" alt="Fifth slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive slideimg" src="assets1/ssu3.jpg" alt="Sixth slide">
                        <div class="carousel-caption bottomneed">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card text-center"
                style="min-height:408px; max-height:408px; margin-bottom:0px; background-color: #b31313;">
                <div class="card-body">
                    <h1 class="card-title text-white" style="font-weight: 500; font-size: 38px;">SorSU Bulan Campus
                        Clinic</h1>
                    <p class="card-text text-white text-justify" style="font-size: 18px;">A web-based capstone project,
                        the Patient
                        Management System with Medicine Demand Forecasting for SorSU Bulan Campus streamlines patient
                        care and medication management. It enables healthcare providers to manage patient information,
                        appointments, and medical histories while forecasting medicine demand using advanced analytics.
                        This user-friendly system improves healthcare operations at SorSU Bulan Campus.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mt-3">
            <!--begin::List Widget 11-->
            <div class="card card-custom mb-2 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 mb-2" style="background-color: #b31313;">
                    <h3 class="card-title font-weight-bolder text-white">Announcement</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                @livewire('announce.index-show')
                <!--end::Body-->
            </div>
            <!--end::List Widget 11-->
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="min-height:615px; margin-bottom: 5px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="card-title" style="font-weight: 500;">CONTACT INFO</h1>
                            <p class="card-text">If you want information about us, fill out our form and we will get in
                                touch with you as soon as possible.</p>

                            <h4 class="mt-2 mb-1" style="font-weight: bold;"><i class="fas fa-envelope"
                                    style="color:#1f87c0;"></i> <span id="">kevingime@gmail.com</span></h4>
                            <h4 class="mt-2 mb-1" style="font-weight: bold;"><i class="fas fa-phone"
                                    style="color:#1f87c0;"></i> <span id="">0917 666 6666</span></h4>
                            <h4 class="mt-2 mb-3" style="font-weight: bold;"><i class="fa fa-map-marker"
                                    style="color:#1f87c0;"></i> <span id="txtmyprofaddress">Sorsogon, Bulan</span></h4>
                            <div id="map-box2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="card-title" style="font-weight: 500;">Drop us a message, and we will get
                                        in touch with you.</h1>
                                </div>
                                <div class="col-md-6 h6contactus">
                                    <input class="form-control" type="text" id="txtcontactname"
                                        style="font-size: 1rem; padding: 1.4rem 0.75rem;" placeholder="Name">
                                </div>
                                <div class="col-md-6 h6contactus">
                                    <input class="form-control" type="text" id="txtcontactemail"
                                        style="font-size: 1rem; padding: 1.4rem 0.75rem;" placeholder="Email">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <textarea class="form-control" rows="5" placeholder="Message" id="txtcontactmessage"></textarea>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="button" class="btn waves-effect waves-light btn-dark"
                                        style="padding: 10px 30px" onclick="sendmessage();">SEND MESSAGE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets1/plugins/Chart.js/Chart.min.js"></script>
@include('home.script')
