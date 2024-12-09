<div class="container mt-5">
    <div class="card mx-auto" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center">Register</h3>
            <form wire:submit.prevent="register">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" wire:model="name" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" wire:model="email" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" wire:model="password" required>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="passwordConfirmation" class="form-control" wire:model="passwordConfirmation" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select id="role" class="form-control" wire:model="role">
                        <option value="">Choose a Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>
