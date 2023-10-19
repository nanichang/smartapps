@extends('layouts.master')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Welcome</h3>
                    <div class="card-body">
                        @if(Auth::user()->profile_image)
                            <img class="image rounded-circle" src="{{asset('/storage/profile_images/'.Auth::user()->profile_image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                        @endif
                        <form method="POST" action="{{ route('dashboard.profile.patch') }}" enctype="multipart/form-data">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                {{-- <label class="custom-file-label" for="chooseFile">Select file</label> --}}
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Upload Files
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
