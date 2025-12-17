@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Profile</h4>
        </div>
        <div class="row">
            <div class="col-auto ml-5 mr-5 my-4">
                @if ($profile->photoProfile != null)
                    <img src="{{ asset('/images/photoProfile/' . $profile->photoProfile) }}"
                        style="width:150px;height:150px;border-radius:100px; object-fit: cover;">
                @else
                    <img src="{{ asset('template/img/boy.png') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>
            <div class="col-auto mx-4">
                <div class="form-group mb-3">
                    <label for="nama" class="text-lg text-secondary font-weight-bold">Full name</label>
                    <h4 class="text-dark">{{ $profile->user->name }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="npm" class="text-lg text-secondary font-weight-bold">NIM</label>
                    <h4 class="text-dark">{{ $profile->npm }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-secondary font-weight-bold">Study program</label>
                    <h4 class="text-dark">{{ $profile->prodi }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-secondary font-weight-bold">Address</label>
                    <h4 class="text-dark">{{ $profile->alamat }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-secondary font-weight-bold">Telephone Number</label>
                    <h4 class="text-dark">{{ $profile->noTelp }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/profile/{{ $profile->id }}/edit" class="btn btn-primary px-5">Edit Profile</a>
        </div>
    </div>
@endsection