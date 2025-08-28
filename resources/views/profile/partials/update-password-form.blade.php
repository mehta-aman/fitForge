<section>
    <header>
        <h2 class="text-lg font-medium mb-2" style="color:#fff;">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm" style="color:#bdbdd7;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')
        <div class="table-responsive">
        <table class="table table-borderless fitforge-profile-table mb-0" style="color:#fff;">
            <tbody>
                <tr>
                    <td class="fitforge-label-td"><label for="update_password_current_password" class="mb-0" style="font-weight:500;">{{ __('Current Password') }}</label></td>
                    <td>
                        <input id="update_password_current_password" name="current_password" type="password" class="form-control rounded-pill px-4 py-2 fitforge-input" style="background:#23234a; color:#fff;" autocomplete="current-password" />
                        @if($errors->updatePassword->get('current_password'))
                            <div class="text-danger mt-2">{{ $errors->updatePassword->get('current_password')[0] }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="fitforge-label-td"><label for="update_password_password" class="mb-0" style="font-weight:500;">{{ __('New Password') }}</label></td>
                    <td>
                        <input id="update_password_password" name="password" type="password" class="form-control rounded-pill px-4 py-2 fitforge-input" style="background:#23234a; color:#fff;" autocomplete="new-password" />
                        @if($errors->updatePassword->get('password'))
                            <div class="text-danger mt-2">{{ $errors->updatePassword->get('password')[0] }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="fitforge-label-td"><label for="update_password_password_confirmation" class="mb-0" style="font-weight:500;">{{ __('Confirm Password') }}</label></td>
                    <td>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control rounded-pill px-4 py-2 fitforge-input" style="background:#23234a; color:#fff;" autocomplete="new-password" />
                        @if($errors->updatePassword->get('password_confirmation'))
                            <div class="text-danger mt-2">{{ $errors->updatePassword->get('password_confirmation')[0] }}</div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary rounded-pill px-4 fitforge-btn-block" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">{{ __('Save') }}</button>
            @if (session('status') === 'password-updated')
                <span class="ml-3 text-success" style="align-self:center;">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>

@push('styles')
<style>
    .form-control {
        background: #23234a !important;
        color: #fff !important;
        border-radius: 2rem !important;
        border: none !important;
        box-shadow: 0 0 8px #6C63FF33 !important;
    }
    .form-control:focus {
        border: 1.5px solid #6C63FF !important;
        box-shadow: 0 0 16px #6C63FF66 !important;
    }
    .btn-primary {
        background: linear-gradient(90deg, #6C63FF 60%, #00C9A7 100%) !important;
        border: none !important;
        border-radius: 2rem !important;
        font-weight: 600;
        box-shadow: 0 0 8px #6C63FF55 !important;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #00C9A7 0%, #6C63FF 100%) !important;
        box-shadow: 0 0 16px #00C9A7 !important;
    }
    .table-borderless td, .table-borderless th {
        border: 0 !important;
    }
    .fitforge-profile-table td.fitforge-label-td {
        width: 180px;
        vertical-align: middle;
        min-width: 100px;
        white-space: nowrap;
    }
    @media (max-width: 600px) {
        .fitforge-profile-table td.fitforge-label-td {
            display: block;
            width: 100%;
            min-width: unset;
            text-align: left;
            padding-bottom: 0.25rem;
        }
        .fitforge-profile-table tr {
            display: block;
            margin-bottom: 1.5rem;
        }
        .fitforge-profile-table td {
            display: block;
            width: 100%;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .fitforge-input {
            width: 100% !important;
        }
        .fitforge-btn-block {
            width: 100%;
        }
        .d-flex.justify-content-end.mt-4 {
            justify-content: center !important;
        }
    }
</style>
@endpush
