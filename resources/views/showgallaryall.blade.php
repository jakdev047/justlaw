@extends('layouts.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Show All Gallary Product</h3>
<div class="row mb">
    <!-- page start-->
    <div class="content-panel">
    <h4>
        @if(Session::has('message'))
        {{Session::get('message')}}
        @endif
    </h4>
    <div class="adv-table">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <thead>
            <tr>
            <th>SL No</th>
            <th>Image URL</th>
            <th class="hidden-phone">Product ID</th>
            <th class="hidden-phone">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $serial = 0;
                foreach ($product_image as $item) {
                    $serial +=1;
            ?>
            <tr class="gradeX">
                <td><?php echo $serial;?></td>
                <td>
                    <img src="{{$item->image_url}}" style="width:50px;height:50px;">
                </td>
                <td class="hidden-phone"><?php echo $item->product_id;?></td>
                <td class="center hidden-phone">
                    <a href="#"> Edit </a> || <a href="#">Delete</a>
                    {{-- <a href="{{url('catedit')}}/{{$category->id}}">Edit</a> || <a href="{{url('catdelete')}}/{{$category->id}}">Delete</a> --}}
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
        </table>
    </div>
    </div>
    <!-- page end-->
</div>
<!-- /row -->
@endsection
