@extends('layouts.app')
@section('title','Visit Edit')
@section('visit','active')
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
            <h1 class="h4 text-gray-900 mb-4">Ndrysho Vizitën!</h1>
          </div>
          <form class="user" method="POST" action="{{ route('visit.update',$visit->id) }}">
                 {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group ">
                        <label class="text-xs" for="pacient">Pacienti</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <button class="btn btn-outline-primary" type="button"  data-toggle="modal" data-target="#pacientModal"><i class="fa fa-plus"></i> </button>
                          </div>
                        <input  value="{{App\Pacient::getPacient($visit->pacient_id)}}" placeholder="Pacienti" class="form-control form-control-user" id="pacient" name="pacient"  data-toggle="modal" data-target="#pacientModal"/>
                        <input  hidden id="pacient-id" value="{{$visit->pacient_id}}"  name="pacient-id"/>
                        <div class="input-group-append">
                          <button type="button"  class="btn btn-outline-danger" onclick="document.getElementById('pacient').value=''; document.getElementById('pacient-id').value='';" >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                  </div>
                        <div class="modal fade" id="pacientModal" tabindex="-1" role="dialog" aria-labelledby="pacientModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="pacientModalLabel">Zgjedh Pacientin</h5>
                                </div>
                                <div class="modal-body mx-2">
                                  <table class="table table-bordered table-hover"  width="100%" cellspacing="0" id="searchPacient">
                                    <thead class="bg-dark text-light">
                                      <tr>
                                        <th scope="col">Emri</th>
                                        <th scope="col">Mbiemri</th>
                                        <th scope="col">Nr Personal</th>
                                        <th scope="col">Shto</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      @if ($errors->has('pacient'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pacient') }}</strong>
                                        </span>
                                    @endif
                    </div>
                    <div class="form-group ">
                            <label class="text-xs" for="user">Dentisti</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-primary" type="button"  data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i> </button>
                              </div>
                            <input  value="{{App\User::getUser($visit->user_id)}}" placeholder="Dentisti" class="form-control form-control-user" id="user" name="user"   data-toggle="modal" data-target="#userModal"  />
                            <input  hidden id="user-id"  value="{{$visit->user_id}}" name="user-id"/>
                            <div class="input-group-append">
                              <button type="button"  class="btn btn-outline-danger" onclick="document.getElementById('user').value=''; document.getElementById('user-id').value='';" >
                                <i class="fa fa-trash"></i>
                              </button>
                            </div>
                      </div>
                            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="userModalLabel">Zgjedh Dentistin</h5>
                                    </div>
                                    <div class="modal-body">
                                      <table class="table table-bordered table-hover"  width="100%" cellspacing="0" id="searchUser" >
                                        <thead class="bg-dark text-light">
                                        <tr>
                                        <th>Dentisti</th>
                                        <th>E-Mail</th>
                                        <th>Shto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                            @if ($errors->has('user'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('user') }}</strong>
                                              </span>
                                          @endif
                    </div>
            <div class="form-group ">
                    <label class="text-xs"  for="data">Data e Vizitës</label>
                    <input type="date" value="{{$visit->visit_date}}" class="form-control form-control-user" required="" name="data" id="data" max="{{date('Y-m-d')}}" placeholder="Data e Vizitës">
                    @if ($errors->has('data'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('data') }}</strong>
                                      </span>
                                  @endif
            </div>
            
            <div class="form-group">
                    <label class="text-xs"  for="time">Ora e Vizitës</label>
                    <select class="form-control form-control-user" id="time" name="time" placeholder="Ora"> 
                      <option @if($visit->time_of_visit == "08:00") selected @else @endif>08:00</option>
                      <option @if($visit->time_of_visit == "08:30") selected @else @endif>08:30</option>
                      <option  @if($visit->time_of_visit == "09:00") selected @else @endif>09:00</option>
                      <option @if($visit->time_of_visit == "09:30") selected @else @endif>09:30</option>
                      <option @if($visit->time_of_visit == "10:00") selected @else @endif>10:00</option>
                      <option @if($visit->time_of_visit == "10:30") selected @else @endif>10:30</option>
                      <option @if($visit->time_of_visit == "11:00") selected @else @endif>11:00</option>
                      <option @if($visit->time_of_visit == "11:30") selected @else @endif>11:30</option>
                      <option @if($visit->time_of_visit == "12:00") selected @else @endif>12:00</option>
                      <option @if($visit->time_of_visit == "12:30") selected @else @endif>12:30</option>
                      <option @if($visit->time_of_visit == "13:00") selected @else @endif>13:00</option>
                      <option @if($visit->time_of_visit == "13:30") selected @else @endif>13:30</option>
                      <option @if($visit->time_of_visit == "14:00") selected @else @endif>14:00</option>
                      <option @if($visit->time_of_visit == "14:30") selected @else @endif>14:30</option>
                      <option @if($visit->time_of_visit == "15:00") selected @else @endif>15:00</option>
                      <option @if($visit->time_of_visit == "15:30") selected @else @endif>15:30</option>
                      <option @if($visit->time_of_visit == "16:00") selected @else @endif>16:00</option>
                      <option @if($visit->time_of_visit == "16:30") selected @else @endif>16:30</option>
                      <option @if($visit->time_of_visit == "17:00") selected @else @endif>17:00</option>
                      <option @if($visit->time_of_visit == "17:30") selected @else @endif>17:30</option>
                      <option @if($visit->time_of_visit == "18:00") selected @else @endif>18:00</option>
                      <option @if($visit->time_of_visit == "18:30") selected @else @endif>18:30</option>
                      <option @if($visit->time_of_visit == "19:00") selected @else @endif>19:00</option>
                      <option @if($visit->time_of_visit == "19:30") selected @else @endif>19:30</option>
                    </select>
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