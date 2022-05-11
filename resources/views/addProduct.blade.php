@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

@section('content')

<div class="container">
    <h3 class="text-center h3">Upload a Images</h3>
    <hr>
    <div class="row justify-content-center">
        {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
    </div> --}}
    {{-- @endif --}}
    <div class="col-md-8">
        <div class="card">
            <form method="POST" action="/addProduct" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div><br>
                <div class="input-group control-group increment">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="filename[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <div>
                    {{-- <label>Name</label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
                    <label>Discription</label>
                    <textarea name="description" rows="4" class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>
                    <div>
                        <label>Choose Images</label>
                        <input type="file" name="images" multiple>
                    </div>
                    <hr>
                    <button type="submit">Submit</button> --}}
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $(".btn-success").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });

    });

</script>
@endsection
