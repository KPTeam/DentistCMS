@extends('layouts.app')
@section('title','Sherbimet')
@section('service','active')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-sm-6">
        <h1 class="h3 mb-4  ">Shërbimet</h1>
      </div>
      <div class="col-sm-6 ">
          <a href="/services/create" class="btn btn-circle btn-success float-right"><i class="fa fa-plus"></i></a>
        </div>
    </div>
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista e shërbimeve</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="ServicedataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Shërbimi</th>
                <th>Qmimi</th>
                <th>Zbritja</th>
                <th>Menaxhimi</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection