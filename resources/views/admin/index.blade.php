@extends('layout.admin_master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/org/app-assets')}}/css/pages/timeline.css">
@endpush
@section('content')
    <div class="content-header row" >
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Horizontal Timeline 2</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Timeline Horizontal
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Basic Horizontal Timeline -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Horizontal Timeline</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="card-text">
                        <p>This horizontal time line contain just date based post timeline.</p>
                        <section class="cd-horizontal-timeline loaded">
                            <div class="timeline">
                                <div class="events-wrapper">
                                    <div class="events" style="width: 1800px;">
                                        <ol>
                                            <li><a href="#0" data-date="17/01/2017" class="selected" style="left: 120px;">17 Jan</a></li>
                                            <li><a href="#0" data-date="29/02/2017" style="left: 300px;">29 Feb</a></li>
                                            <li><a href="#0" data-date="21/04/2017" style="left: 480px;">21 Mar</a></li>
                                            <li><a href="#0" data-date="22/05/2017" style="left: 600px;">22 May</a></li>
                                            <li><a href="#0" data-date="09/07/2017" style="left: 780px;">09 Jul</a></li>
                                            <li><a href="#0" data-date="30/08/2017" style="left: 960px;">30 Aug</a></li>
                                            <li><a href="#0" data-date="15/09/2017" style="left: 1020px;">15 Sep</a></li>
                                            <li><a href="#0" data-date="01/11/2017" style="left: 1200px;">01 Nov</a></li>
                                            <li><a href="#0" data-date="10/12/2017" style="left: 1320px;">10 Dec</a></li>
                                            <li><a href="#0" data-date="19/01/2018" style="left: 1500px;">29 Jan</a></li>
                                            <li><a href="#0" data-date="03/03/2018" style="left: 1680px;">3 Mar</a></li>
                                        </ol>

                                        <span class="filling-line" aria-hidden="true" style="transform: scaleX(0.0817101);"></span>
                                    </div>
                                    <!-- .events -->
                                </div>
                                <!-- .events-wrapper -->

                                <ul class="cd-timeline-navigation">
                                    <li><a href="#0" class="prev inactive">Prev</a></li>
                                    <li><a href="#0" class="next">Next</a></li>
                                </ul>
                                <!-- .cd-timeline-navigation -->
                            </div>
                            <!-- .timeline -->

                            <div class="events-content">
                                <ol>
                                    <li class="selected" data-date="17/01/2017">
                                        <h2>Journey Started</h2>
                                        <h3 class="text-muted mb-1"><em>January 17th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="29/02/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>February 29th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="21/04/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>March 21th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="22/05/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>May 22th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="09/07/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>July 9th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="30/08/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>August 30th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="15/09/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>September 15th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="01/11/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>November 1st, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="10/12/2017">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>December 10th, 2017</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="19/01/2018">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>January 19th, 2018</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>

                                    <li data-date="03/03/2018">
                                        <h2>Event title here</h2>
                                        <h3 class="text-muted mb-1"><em>March 3rd, 2018</em></h3>
                                        <p class="lead">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
                                            reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                        </p>
                                    </li>
                                </ol>
                            </div>
                            <!-- .events-content -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Basic Horizontal Timeline -->
    </div>
@endsection
@push('js')
    <script src="{{asset('/org/app-assets')}}/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
@endpush

