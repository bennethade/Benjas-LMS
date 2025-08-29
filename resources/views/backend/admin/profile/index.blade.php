@extends('backend.admin.master')

@section('content')


    <!--start page wrapper -->
    <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">

                        
                        @include('backend.admin.profile.sidebar')
                        
                        <div class="col-lg-8">
                            <div class="card">
                                <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session('error') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                    @endif
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">First Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Middle Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="middle_name" value="{{ auth()->user()->middle_name }}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Surname</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="surname" value="{{ auth()->user()->surname }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">City</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="city" value="{{ auth()->user()->city }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Country</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="country" value="{{ auth()->user()->country }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Gender</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="gender" id="" class="form-select">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">DOB</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="date" name="date_of_birth"value="{{ auth()->user()->date_of_birth }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Experience</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="experience" value="{{ auth()->user()->experience }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Bio</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="bio" value="{{ auth()->user()->bio }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Profile Image</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" name="photo" id="photo" class="form-control" />
                                            </div>
                                        </div>

                                        {{-- <button type="submit" class="btn btn-primary px-4">Save Changes</button> --}}
                                        
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4 w-100" value="Update" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--end page wrapper -->

@endsection