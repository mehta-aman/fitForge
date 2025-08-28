<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium" style="color:#fff;">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm" style="color:#bdbdd7;">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Trigger Button -->
    <button type="button" class="btn btn-danger rounded-pill px-4 py-2" data-toggle="modal" data-target="#confirmUserDeletionModal" style="font-weight:600; box-shadow:0 0 8px #ff4b5c55;">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background:#18182a; color:#fff; border-radius:1rem; box-shadow:0 0 32px #6C63FF33;">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')
                    <div class="modal-header" style="border-bottom:1px solid #23234a;">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel" style="color:#ff4b5c;">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#bdbdd7;">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
                        <div class="form-group mt-4">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password" class="form-control rounded-pill bg-dark text-white border-0 px-4 py-2" placeholder="{{ __('Password') }}" style="background:#23234a; color:#fff;" />
                            @if($errors->userDeletion->get('password'))
                                <div class="text-danger mt-2">
                                    {{ $errors->userDeletion->get('password')[0] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:1px solid #23234a;">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4" style="font-weight:600; box-shadow:0 0 8px #ff4b5c55;">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
</section>

@push('styles')
<style>
    .modal-content {
        background: #18182a !important;
        color: #fff !important;
        border-radius: 1rem !important;
        box-shadow: 0 0 32px #6C63FF33 !important;
    }
    .btn-danger {
        background: #ff4b5c !important;
        border: none !important;
        border-radius: 2rem !important;
        font-weight: 600;
        box-shadow: 0 0 8px #ff4b5c55 !important;
    }
    .btn-danger:hover {
        background: #ff1e38 !important;
        box-shadow: 0 0 16px #ff4b5c !important;
    }
    .btn-secondary {
        background: #23234a !important;
        color: #fff !important;
        border-radius: 2rem !important;
        border: none !important;
    }
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
</style>
@endpush
