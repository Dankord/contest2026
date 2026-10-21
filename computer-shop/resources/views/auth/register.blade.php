<x-layout>
    <x:slot:title>
        Register
    </x:slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100 items-center p-6">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-8">Create Account</h1>
                <form method="POST" action="/register">
                    @csrf
                    {{-- name --}}
                    <label class="floating-label mb-6">
                        <input type="text"
                               name="name"
                               placeholder="John Doe..."
                               value="{{ old('name') }}"
                               class="input input-bordered @error('name') input-error @enderror"
                               required>
                    </label>
                    @error('name')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                    {{-- email --}}
                    <label class="floating-label mb-6">
                        <input type="email"
                               name="email"
                               placeholder="johndoe@email.com"
                               value="{{ old('email') }}"
                               class="input input-bordered @error('email') input-error @enderror"
                               required>
                    </label>
                    @error('email')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                    {{-- password --}}
                    <label class="floating-label mb-6">
                        <input type="password"
                               name="password"
                               placeholder="******"
                               class="input input-bordered @error('password') input-error @enderror"
                               required>
                    </label>
                    @error('password')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                    {{-- password confirmation --}}
                    <label class="floating-label mb-6">
                        <input type="password"
                               name="password_confirmation"
                               placeholder="******"
                               class="input input-bordered"
                               required>
                    </label>
                    <div class="form-control mt-8">
                        <button class="btn btn-primary btn-sm w-full">
                            Register
                        </button>
                    </div>
                </form>
                <div class="divider">OR</div>
                <p class="text-center text-sm">
                    Already have an existing account?
                    <a href="/login" class="link link-primary">Sign in</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>