@extends('layouts.app')


@section('content')

<div class="container">
    <h3 class="text-center h3">Upload a vidio</h3>
    <hr>
    <div class="row justify-content-center">
        {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
    </div> --}}
    {{-- @endif --}}
    <div class="col-md-8">
        <div class="card">
            <form method="POST" action="/addVideo" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" name="title" placeholder="Enter Product Name" class="form-control">
                </div><br>

                <div class="input-group control-group increment">
                    <input type="file" name="videoName" class="form-control">

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>

                <div>

            </form>
        </div>
    </div>
</div>
</div>

@endsection
