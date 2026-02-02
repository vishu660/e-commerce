@extends('admin.layouts.layout')

@section('title', 'Admin Profile')
@section('page-title', 'Profile')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Profile Details Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Admin Details</h5>

                    <!-- Edit Button -->
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </button>
                </div>

                <div class="card-body">
               <table class="table table-borderless mb-0">
                    <tr>
                        <th width="30%">Name</th>
                        <td>{{ Auth::user()->name ?? 'Admin User' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email ?? 'admin@email.com' }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>
                            <span class="badge bg-success">Administrator</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Account Created</th>
                        <td>{{ Auth::user()?->created_at?->format('d M Y') ?? '-' }}</td>
                    </tr>
                </table>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- ================= EDIT PROFILE MODAL ================= -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">

            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="#">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"
                               class="form-control"
                               value="{{ Auth::user()->name ?? '' }}"
                               placeholder="Enter name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               value="{{ Auth::user()->email ?? '' }}"
                               placeholder="Enter email">
                    </div>

                    <hr>

                    <h6 class="mb-2">Change Password (optional)</h6>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="New password">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Confirm password">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
