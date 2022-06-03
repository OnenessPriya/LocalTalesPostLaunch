@extends('site.appprofile')
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
                <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
                    <tbody>
                        <tr>
                            <td>Created By</td>
                            <td>{{ empty($loop->user['name'])? null:$loop->user['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>{{ empty($loop['content'])? null:$loop['content'] }}</td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td>{{ empty($loop['created_at'])? null:$loop['created_at'] }}</td>
                        </tr>
                        <tr>
                            <td>No of Likes</td>
                            <td>{{ empty($loop['no_of_likes'])? null:$loop['no_of_likes'] }}</td>
                        </tr>
                        <tr>
                            <td>No of Dislikes</td>
                            <td>{{ empty($loop['no_of_dislikes'])? null:($loop['no_of_dislikes']) }}</td>
                        </tr>
                        <tr>
                            <td>No of comments</td>
                            <td>{{ empty($loop['no_of_comments'])? null:($loop['no_of_comments']) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <p>Comment List</p>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> User </th>
                                <th> Comment </th>
                                <th> Created At </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loop->comments as $key => $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{ date("d-M-Y",strtotime($comment->created_at)) }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            
                                            <a href="#" data-id="{{$comment['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    var id = $(this).data('id');
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
        window.location.href = "site-LocalLoop-comment/"+id+"/delete";
        } else {
          swal("Cancelled", "Record is safe", "error");
        }
    });
});
</script>
<script type="text/javascript">
    $('input[id="toggle-block"]').change(function() {
        var id = $(this).data('id');
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
            url:"{{route('site.localloop.post.updateStatus')}}",
            data:{ _token: CSRF_TOKEN, id:id, check_status:check_status},
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
</script>
@endpush
