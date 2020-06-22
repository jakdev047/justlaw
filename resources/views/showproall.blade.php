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
            <th>Role Name</th>
            <th class="hidden-phone">Role Code</th>
            <th class="hidden-phone">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="gradeX">
                <td>1</td>
                <td>Role Name</td>
                <td class="hidden-phone">Role Code</td>
                <td class="center hidden-phone">Edit || Delete</td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
    <!-- page end-->
</div>
<!-- /row -->
@endsection
