@extends('layouts.app')
@section('title','Ndrysho Pacient')
@section('pacient','active')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 m-auto d-flex justify-content-center ">
                <img src="{{App\User::getLogo()}}" class="img-fluid" />
            </div>
        <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 @if(App\User::getAppTheme() == true) text-gray-100 @else text-gray-900 @endif mb-4">Ndrysho Pacientin {{$pacient->first_name}} {{$pacient->last_name}}</h1>
                </div>
            <form class="user" method="POST" action="{{ route('pacient.update',$pacient->id) }}">
                    {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="text-xs"  for="first_name">Emri Mbiemri</label>
                    <input id="first_name" name="Emri" required type="text" value="{{$pacient->name}}" class="form-control form-control-user  @error('Emri') is-invalid @enderror"   placeholder="Emri">
                        @if ($errors->has('Emri'))
                            <span class="help-block">
                                <strong class="text-danger"><small>{{ $errors->first('Emri') }}</small></strong>
                            </span>
                        @endif
                </div>
                <div class="form-group row">
                    <label class="text-xs"  for="phone">Telefoni</label>
                    <input id="phone" name="Telefoni" value="{{$pacient->phone}}" required type="text" class="form-control form-control-user @error('Telefoni') is-invalid @enderror"  placeholder="Numri i telefonit">
                        @if ($errors->has('Telefoni'))
                            <span class="help-block">
                                <strong class="text-danger"><small>{{ $errors->first('Telefoni') }}</small></strong>
                            </span>
                        @endif
                </div>
                <div class="form-group row">
                    <label class="text-xs"  for="info">Info</label>
                    <input id="info" name="info"  type="text" value="{{$pacient->info}}" class="form-control form-control-user  @error('info') is-invalid @enderror"   placeholder="Info">
                        @if ($errors->has('info'))
                            <span class="help-block">
                                <strong class="text-danger"><small>{{ $errors->first('info') }}</small></strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                        <a class="btn btn-circle btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i></a>
                          <button type="submit"  class="btn btn-circle btn-primary float-right"><i class="fa fa-pen"></i></button>
                        </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
