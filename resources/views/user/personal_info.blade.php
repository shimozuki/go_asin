<div class="tab-pane" id="personal" role="tabpanel">
        <!-- personal card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Tentang Saya</h5>
                <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                    <i class="icofont icofont-edit"> Edit</i>
                </button>
            </div>
            <div class="card-block">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="general-info">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nama</th>
                                                        <td>{{auth::user()->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Kelamin</th>
                                                        <td>Female</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Lahir</th>
                                                        <td>October 25th, 1990</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status</th>
                                                        <td>Mahasiswa</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat</th>
                                                        <td>Jakarta</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td><a href="#!"><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f">[email&#160;protected]</span></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nomor Telepon</th>
                                                        <td>(0123) - 4567891</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Linkedln</th>
                                                        <td>@xyz</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Facebook</th>
                                                        <td>demo.skype</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Instagram</th>
                                                        <td><a href="#!">www.demo.com</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                    <!-- end of row -->
                </div>
            </div>
            <!-- end of card-block -->
        </div>
        <!-- personal card end-->
    </div>