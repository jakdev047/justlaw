@extends('layouts.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Show All Category</h3>
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
            <th>Role Name</th>
            <th class="hidden-phone">Role Code</th>
            <th class="hidden-phone">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $serial = 0;
                foreach ($categories as $category) {
                    $serial +=1;
            ?>
            <tr class="gradeX">
                <td><?php echo $serial;?></td>
                <td><?php echo $category->name;?></td>
                <td class="hidden-phone"><?php echo $category->code;?></td>
                <td class="center hidden-phone">
                    <a href="#">Edit</a> || <a href="{{url('catdelete')}}/{{$category->id}}">Delete</a>
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
