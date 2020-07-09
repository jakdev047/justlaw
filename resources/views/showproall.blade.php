@extends('layouts.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Show All Product</h3>
<div class="row mb">
    <!-- page start-->
    <div class="content-panel">
    <div class="adv-table">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <thead>
            <tr>
            <th>SL No</th>
            <th>Title</th>
            <th class="hidden-phone">Buy Price</th>
            <th class="hidden-phone">Regular Price</th>
            <th class="hidden-phone">Flate Price</th>
            <th class="hidden-phone">Short Des</th>
            <th class="hidden-phone">Category ID</th>
            <th class="hidden-phone">Tag</th>
            <th class="hidden-phone">Quantity</th>
            <th class="hidden-phone">Feature Image</th>
            <th class="hidden-phone">Rating</th>
            <th class="hidden-phone">Product Info</th>
            <th class="hidden-phone">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $serial = 0;
                foreach ($product as $item) {
                    $serial +=1;
            ?>
            <tr class="gradeX">
                <td><?php echo $serial;?></td>
                <td><?php echo $item->title;?></td>
                <td class="hidden-phone"><?php echo $item->buy_price;?></td>
                <td class="hidden-phone"><?php echo $item->regular_price;?></td>
                <td class="hidden-phone"><?php echo $item->flate_price;?></td>
                <td class="hidden-phone"><?php echo $item->shortdes;?></td>
                <td class="hidden-phone"><?php echo $item->cat_id;?></td>
                <td class="hidden-phone"><?php echo $item->tag;?></td>
                <td class="hidden-phone"><?php echo $item->quantity;?></td>
                <td class="hidden-phone">
                    <img src="{{$item->feature_image}}" style="width:40px;height:40px;">
                </td>
                <td class="hidden-phone"><?php echo $item->rating;?></td>
                <td class="hidden-phone"><?php echo $item->product_info;?></td>
                <td class="center hidden-phone">
                    <a href="{{url('proedit')}}/{{$item->id}}">Edit</a> || <a href="{{url('prodelete')}}/{{$item->id}}">Delete</a>
                    {{-- <a href="{{url('catedit')}}/{{$item->id}}">Edit</a> || <a href="{{url('catdelete')}}/{{$item->id}}">Delete</a> --}}
                </td>
            </tr>
            <?php  } ?>
        </tbody>
        </table>
    </div>
    </div>
    <!-- page end-->
</div>
<!-- /row -->
@endsection
