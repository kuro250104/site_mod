<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold ">Mettre à jour le mot de passe</h6>
    </div>
    <div class="card-body">
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.</p>
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Mot de passe actuel') }}
                </label>
                <input id="current_password" name="current_password" type="password" class="form-control bg-light border small" autocomplete="current-password" />
                @error('current_password')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Nouveau mot de passe') }}
                </label>
                <input id="password" name="password" type="password" class="form-control bg-light border small" autocomplete="new-password" />
                @error('password')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Confirmer le mots de passe') }}
                </label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control bg-light border small" autocomplete="new-password" />
                @error('password_confirmation')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center pt-2 gap-4">
                <button type="submit" class="btn btn-secondary btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Enregister</span>
                </button>
                @if (session('status') === 'password-updated')
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>

</div>
