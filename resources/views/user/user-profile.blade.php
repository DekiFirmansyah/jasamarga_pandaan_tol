@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="portfolio-details" class="portfolio-details">
<div class="container p-0">

    <div class="row">
        <div class="section-title">
            <h2>   </h2>
            <h2>   </h2>
            <h2>   </h2>
            <p>     </p>
            <h2>Profile</h2>
        </div>
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="profile" class="btn btn-sm btn-primary">Cancel</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Massage</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="11111">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Email</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-default center">Save</a>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</section>
@endsection
