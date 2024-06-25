@extends('layouts/contentLayoutMaster')

@section('title', 'Users')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')

<div id="import-results" style="display: none;"></div>
<style type="text/css">
  td.action-area {
    height: 13vh;
}

table.dataTable td, table.dataTable th {
    padding: 0.7rem 0.2rem;
    vertical-align: middle;
}

.table:not(.table-dark):not(.table-light) thead:not(.table-dark) th, .table:not(.table-dark):not(.table-light) tfoot:not(.table-dark) th {
    padding-left: 15px;
}

table.dataTable td, table.dataTable th {
    padding: 0.7rem 1.2rem;
}

td.action-area {
    display: flex;
    justify-content: space-evenly;
}
</style>
</div>
</div>
<!-- Advanced Search -->

@if(session('success'))
<div class="alert alert-success  p-1">
  {{ session('success') }}
</div>
@endif
@if(session('errors'))
<div class="alert alert-warning  p-1">
  {{ session('errors') }}
</div>
@endif
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Advanced Search</h4>

          <a href="{{ url('user/create') }}" class="btn btn-primary"> <i class="me-1" data-feather="plus"></i>Add User</a>

        </div>
        <!--Search Form -->
        <hr class="my-0" />
        <div class="card-datatable">
          <table class="dt-advanced-search table">
            <thead>
              <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>           
                <th>Location</th>
                <th>Profile</th>
                <th>Action</th>
  
              </tr>
            </thead>
            <tbody>
            <!-- users, user-create user-edit -->

              @foreach($users as $user)
              <tr>
       
                <td>{{$user->user_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
               
                <td><img src="{{ asset($user->image)}}" class="mt-1" width="50" height="50"></td>
                <!-- <td class="user_status_on">Activate</td> -->

                <td class="action-area">
                      <a href="{{ route('user-edit', ['id' => $user->id])}}" class="text-light"><i class="me-1 text-success" data-feather="edit-2"></i></a>
                    <form action="{{ route('user-delete', ['id' =>$user->id])}}" method="post" class="deleteGroup">
                        @method('DELETE')
                        @csrf
                          <button type="submit" class="me-1 show_confirm" data-toggle="tooltip" title='Delete'> <i class="me-1 text-danger" data-feather="trash-2"></i></button>      
                    </form>  
                </td>
              
              @endforeach
             
            </tbody>
          </table>

     
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Advanced Search -->


@endsection


@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>

@endsection