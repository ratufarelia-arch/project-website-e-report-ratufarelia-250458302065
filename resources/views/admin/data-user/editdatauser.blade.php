@extends('layouts.dashboard')
@section('title', 'Form edit Data User')
@section('content')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form edit Data User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('update.datauser',$user->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name"> Name</label>
                                        <input type="text" id="name" class="form-control"
                                         value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" class="form-control"
                                         value="{{$user->usernamel}}" name="username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" value="{{$user->email}}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" id="password" class="form-control"
                                          name="password">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                   <label for="jenis_kelamin">Jenis kelamin</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="p">Perempuan</option>
                                            <option value="l">Laki-laki</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="telp">No Telp</label>
                                        <input type="text" id="telp" class="form-control"
                                          value="{{$user->telp}}" name="telp">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->
@endsection