@extends('layouts.master')
@section('content')
    <div class="content mt-3">

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New User</div>
                                <div class="stat-digit">{{$newUser}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active User</div>
                                <div class="stat-digit">{{$activeUser}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Deactive User</div>
                                <div class="stat-digit">{{$deActiveUser}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-info border-info"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total User</div>
                                <div class="stat-digit">{{$totalUser}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Profit</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Message Payment</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Direct Payment</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Member Payment</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Member</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Deactive Member</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-info border-info"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Member</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-email text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Message</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Astrologer</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Deactive Astrologer</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-info border-info"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Astrologer</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-email text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Empty</div>
                                        <div class="stat-digit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">USER</h1>
                        <!-- HTML -->
                        <div id="userChart"></div>
                    </div>
                    <div class="card-footer">
       
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">RECENT USER</h1>
                        <!-- HTML -->
                        <div id="recentUserChart"></div>
                    </div>
                    <div class="card-footer">
       
                    </div>
                </div>
            </div>

    </div> <!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->

<!-- Styles -->
@endsection