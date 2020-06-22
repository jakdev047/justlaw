@extends('layouts.app')
@section('content')
<!-- INLINE FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Create Category</h4>
            <form class="form-login" action="{{route('catsave')}}" method="post">
                @csrf
                <h4>
                    @if(Session::has('message'))
                    {{Session::get('message')}}
                    @endif
                </h4>
                <div class="form-group">
                    <label class="sr-only" for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="code">Code</label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter Code">
                </div>
                <button type="submit" class="btn btn-theme">Add Category</button>
            </form>
        </div><!-- /form-panel -->
    </div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection
