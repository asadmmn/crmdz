<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        @role('user')
    <div class="container">
    <form action="{{ route('candidates.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <x-text-input label="Full Name" name="full_name" placeholder={{$user->full_name}}/>
    <x-input label="Picture" name="picture" type="file" />
    <x-input label="Email" name="email" type="email" />
    <x-input label="Resume" name="resume" type="file" />
    <x-text-input label="Phone Number" name="phone_number" />
    
    <x-select label="Gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </x-select>
    
    <x-text-input label="Birth Date" name="birth_date" type="date" />
    <x-text-input label="Address" name="address" />
    <x-text-input label="Zipcode" name="zipcode" />
    <x-text-input label="Latest Degree" name="latest_degree" />
    <x-text-input label="Latest University" name="latest_university" />
    <x-text-input label="Current Company" name="current_company" />
    <x-text-input label="Current Department" name="current_department" />
    <x-text-input label="Current Position" name="current_position" />
    
    <x-textarea label="Description" name="description" />

    <button type="submit" class="btn btn-primary">{{ __('Create Candidate') }}</button>
</form>

    </div>
    @endrole

@role('Admin')
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>@endrole
</section>
