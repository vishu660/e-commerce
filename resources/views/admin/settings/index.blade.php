@extends('admin.layouts.layout')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')

<div class="container-fluid">

    <div class="row">

        <!-- Left Menu -->
<div class="col-md-3">
    <div class="card shadow-sm border-0">
        <div class="list-group list-group-flush">

            <a href="javascript:void(0)" 
               class="list-group-item active open-setting-modal" 
               data-title="General Settings">
                <i class="fas fa-cog me-2"></i> General
            </a>

            <a href="javascript:void(0)" 
               class="list-group-item open-setting-modal" 
               data-title="Store Settings">
                <i class="fas fa-store me-2"></i> Store
            </a>

            <a href="javascript:void(0)" 
               class="list-group-item open-setting-modal" 
               data-title="Security Settings">
                <i class="fas fa-lock me-2"></i> Security
            </a>

            <a href="javascript:void(0)" 
               class="list-group-item open-setting-modal" 
               data-title="Notification Settings">
                <i class="fas fa-bell me-2"></i> Notifications
            </a>

            <!-- Profile = no modal -->
            <a href="{{ route('admin.profile') }}" class="list-group-item">
                <i class="fas fa-user me-2"></i> Profile
            </a>

        </div>
    </div>
</div>


        <!-- Right Content -->
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h6 class="mb-0">General Settings</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Site Name</label>
                        <input type="text" name="site_name" class="form-control"
                            value="{{ $settings['site_name'] ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Admin Email</label>
                        <input type="email" name="admin_email" class="form-control"
                            value="{{ $settings['admin_email'] ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Currency</label>
                        <select name="currency" class="form-select">
                            <option value="INR" {{ ($settings['currency'] ?? '')=='INR'?'selected':'' }}>INR (₹)</option>
                            <option value="USD" {{ ($settings['currency'] ?? '')=='USD'?'selected':'' }}>USD ($)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Timezone</label>
                        <select name="timezone" class="form-select">
                            <option value="Asia/Kolkata">Asia/Kolkata</option>
                            <option value="UTC">UTC</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Maintenance Mode</label>
                        <select name="maintenance_mode" class="form-select">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                    </form>


                </div>
            </div>
        </div>

    </div>

</div>

<div class="modal fade" id="settingsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalTitle">Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label class="form-label">Option Name</label>
                        <input type="text" class="form-control" placeholder="Enter value">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Enabled</option>
                            <option>Disabled</option>
                        </select>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save
                </button>
            </div>

        </div>
    </div>
</div>




@endsection
