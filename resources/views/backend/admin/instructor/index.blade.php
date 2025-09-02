@extends('backend.admin.master')

@section('content')


<div class="page-content">
        
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Instructor', 'subtitle' => 'Manage Instructors'])
        <!--end breadcrumb-->
        
        <div style="display: flex; align-items:center; justify-content:space-between;">
            <h6 class="mb-0 text-uppercase">All Instructors</h6>
            {{-- <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Instructor</a> --}}
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allInstructors as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($item->photo)
                                            <img src="{{ asset($item->photo) }}" alt="" width="60" height="60">
                                        @else
                                            <span>No Image Found</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->surnname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-primary px-3 py-2" style="font-weight: 200">Active</span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2" style="font-weight: 200">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" style="cursor: pointer" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault{{ $item->id }}" data-user-id="{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }}>

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
    <script>
        $('.form-check-input').on('change', function() {
            const userId = $(this).data('user-id');
            const status = $(this).is(':checked') ? 1 : 0;  //Get status 1:Active, 0:Inactive
            const row = $(this).closest('tr')  //Find the parent row of the checkbox

            $.ajax({
                url: "{{ route('admin.instructor.status') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId,
                    status: status
                },

                success: function(response) {
                    if (response.success) {
                        const statusBadge = row.find('td:nth-child(6) .badge'); //Find the status badge in the 6th column
                        if (status == 1) {
                            statusBadge
                                .removeClass('bg-danger')
                                .addClass('bg-primary')
                                .text('Active');
                        } else {
                            statusBadge
                                .removeClass('bg-primary')
                                .addClass('bg-danger')
                                .text('Inactive');
                        }

                        //Show SweetAlert Toast Notification
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                    } else {
                        swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error: ' + response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'An error occurred while updating status.',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
            });
        });
    </script>
    
@endpush