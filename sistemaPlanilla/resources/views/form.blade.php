@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
<section role="main" class="content-body">
    <!-- start: page -->
    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Select Replacement</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" action="#">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Basic select</label>
                            <div class="col-md-6">
                                <select data-plugin-selectTwo class="form-control populate" id="searchTextField">
                                </select>
                            </div>
                        </div>
                        <!-- end: page -->
            </section>
        </div>
</section>
@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/select2/select2_locale_es.js"></script>
<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
@endpush