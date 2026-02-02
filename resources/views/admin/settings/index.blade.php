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
                    <form>

                        <div class="mb-3">
                            <label class="form-label">Site Name</label>
                            <input type="text" class="form-control" value="My E-Commerce Store">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Admin Email</label>
                            <input type="email" class="form-control" value="admin@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-select">
                                <option selected>INR (₹)</option>
                                <option>USD ($)</option>
                                <option>EUR (€)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Timezone</label>
                            <select class="form-select">
                                <option selected>Asia/Kolkata</option>
                                <option>UTC</option>
                                <option>America/New_York</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Maintenance Mode</label>
                            <select class="form-select">
                                <option>No</option>
                                <option>Yes</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Settings
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
<script>
document.querySelectorAll('.open-setting-modal').forEach(item => {
    item.addEventListener('click', function () {

        // active class change
        document.querySelectorAll('.list-group-item').forEach(el => el.classList.remove('active'));
        this.classList.add('active');

        // set modal title
        const title = this.getAttribute('data-title');
        document.getElementById('settingsModalTitle').innerText = title;

        // open modal
        const modal = new bootstrap.Modal(document.getElementById('settingsModal'));
        modal.show();
    });
});
</script>


@endsection
