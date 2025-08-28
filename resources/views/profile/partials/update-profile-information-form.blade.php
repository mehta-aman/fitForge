<section>
    <header>
        <h2 class="text-lg font-medium mb-2" style="color:#fff;">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm" style="color:#bdbdd7;">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')
        <div class="table-responsive">
        <table class="table table-borderless fitforge-profile-table mb-0" style="color:#fff;">
            <tbody>
                <tr>
                    <td class="fitforge-label-td"><label for="name" class="mb-0" style="font-weight:500;">{{ __('Name') }}</label></td>
                    <td>
                        <input id="name" name="name" type="text" class="form-control rounded-pill px-4 py-2 fitforge-input" style="background:#23234a; color:#fff;" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        @if($errors->get('name'))
                            <div class="text-danger mt-2">{{ $errors->get('name')[0] }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="fitforge-label-td"><label for="email" class="mb-0" style="font-weight:500;">{{ __('Email') }}</label></td>
                    <td>
                        <input id="email" name="email" type="email" class="form-control rounded-pill px-4 py-2 fitforge-input" style="background:#23234a; color:#fff;" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        @if($errors->get('email'))
                            <div class="text-danger mt-2">{{ $errors->get('email')[0] }}</div>
                        @endif
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-2">
                                <span style="color:#ffb347;">{{ __('Your email address is unverified.') }}</span>
                                <button type="submit" formaction="{{ route('verification.send') }}" class="btn btn-link p-0 align-baseline" style="color:#6C63FF; text-decoration:underline;">{{ __('Click here to re-send the verification email.') }}</button>
                                @if (session('status') === 'verification-link-sent')
                                    <span class="ml-2 font-medium text-success">{{ __('A new verification link has been sent to your email address.') }}</span>
                                @endif
                            </div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary rounded-pill px-4 fitforge-btn-block" style="font-weight:600; box-shadow:0 0 8px #6C63FF55;">{{ __('Save') }}</button>
            @if (session('status') === 'profile-updated')
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
        width: 140px;
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
