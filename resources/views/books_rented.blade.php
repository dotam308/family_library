@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Manage Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Manage Books Rented Page.</p>
        </div>
        <div class="breadcrumb">    
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Books Rented</li>
            </ul>
        </div>
    </div>
</section>
@endsection

@section('content')
<h3>Book Rent List</h3>
<form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên sách</th>
                    <th>Người mượn</th>
                    <th>Số lượng mượn</th>
                    <th>Ngày mượn</th>
                    <th>Ngày hẹn trả</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @forelse ($borrow as $b)
                <?php
                $id = $b->id;
                
                $i++;
                ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{$b->username}}</td>
                        <td>{{ $b->quantity }}</td>
                        <td>{{ $b->borrowDate }}</td>
                        <td>{{ $b->returnDate }}</td>
                        @if ($b->returned == "false")
                        <td>Chưa trả</td>
                        @else
                        <td>Đã trả</td>
                        @endif
                       
                        <td>
                            <a rel="{{ $id }}" href="javascript:" id="deleteButton"><i class="fa fa-trash"></i></a>
                            <a href="{{ route('rents_byId', compact('id')) }}"><i class="fa fa-edit"></i></a>
                        </td>    
                    </tr>
                @empty
                <td>No data</td>
                @endforelse
                
            </tbody>

        </table>
    </form>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           
           swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                window.location.href = "/delete_rented/" + id;
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        })
    })
</script>

@endsection