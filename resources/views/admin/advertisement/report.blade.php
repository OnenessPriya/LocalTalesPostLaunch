@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>

    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-auto">
                    <form action="" id="checkout-form">
                    <div class="row g-3 align-items-center mb-3">
                        {{-- <div class="col-auto"> --}}
                            <div class="col-3">
                                <select class="filter_select form-control" name="business_id">
                                    <option value="" hidden selected>Search by Business</option>
                                    @foreach ($businesses as $index => $item)
                                        <option value="{{$item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="date" name="start_date" class="form-control pl-3" placeholder="Search by start date...">
                            </div>
                            <div class="col-3">
                                <input type="date" name="end_date" class="form-control pl-3" placeholder="Search by end date...">
                            </div>
                        {{-- </div> --}}
                        <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">Search Advertisement </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Advertisement Name </th>
                                <th> Business Name </th>
                                <th> Image </th>
                                <th> Start Date </th>
                                <th> End Date </th>
                                <th colspan="2"> Click </th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->business->name }}</td>
                                    <td>
                                        @if($category->image!='')
                                        <img style="width: 50px;height: 50px;" src="{{URL::to('/').'/advertisements/'}}{{$category->image}}">
                                        @endif
                                    </td>
                                    <td>{{ $category->start_date }}</td>
                                    <td>{{ $category->end_date }}</td>
                                    <td> <a href={{ route('admin.business.advertisement.user.views',$category->id) }}}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye pr-2"></i>{{ $category->click_count }}</a></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});</script>
     {{-- New Add --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var categoryid = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "category/"+categoryid+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var category_id = $(this).data('category_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var check_status = 0;
          if($(this).is(":checked")){
              check_status = 1;
          }else{
            check_status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.category.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:category_id, check_status:check_status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {

                  swal("Error!", response.message, "error");
                }
              });
        });


        $(document).on("click", "#btnFilter", function() {
        $('#checkout-form').submit();
    });
    </script>
@endpush
