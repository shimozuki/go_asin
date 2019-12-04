<div class="tab-pane active" id="kost" role="tabpanel">
        <div class="row">
            <div class="col-xl-3">
                <!-- user contact card left side start -->
                <div class="card">
                    <div class="card-header contact-user">
                        <img class="img-radius img-40" src="..\files\assets\images\avatar-4.jpg" alt="contact-user">
                        <h5 class="m-l-10">{{auth::user()->name}}</h5>
                    </div>
                    <div class="card-block">
                        <ul class="nav nav-tabs md-tabs tabs-left" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kosaktif" role="tab">Kos Aktif</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#book" role="tab">Booking</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contacts</h4>
                    </div>
                    
                </div>
                <!-- user contact card left side end -->
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="tab-content tabs-left-content card-block">
                        <div class="tab-pane active" id="kosaktif" role="tabpanel">
                            <p class="m-0 text-center">
                                Kamu Belum mempunyai kos yang aktif, yuk cari... <br><br>
                                <a href="{{url('/')}}" class="btn btn-primary btn-sm"> Cari Kos</a>
                            </p>
                        </div>
                        <div class="tab-pane" id="book" role="tabpanel">
                            <p class="m-0 text-center">
                                Kamu Belum booking kos, yuk booking... <br><br>
                                <a href="{{url('/')}}" class="btn btn-info btn-sm"> Booking Kos</a>
                            </p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>