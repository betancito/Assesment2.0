<div class="d-flex justify-content-center align-items-center min-vh-100">
    <!-- Card for the form -->
    <div class="card w-75">
        <div class="card-header">
            <h3 class="card-title">{{ $isEditing ? 'Edit Patient' : 'Add New Patient' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                <!-- Identification Number -->
                <div class="form-group">
                    <label for="identification">Identification Number</label>
                    <input type="text" id="identification" wire:model="identification" class="form-control @error('identification') is-invalid @enderror">
                    @error('identification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="name" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DOB -->
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" wire:model="dob" class="form-control @error('dob') is-invalid @enderror">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" wire:model="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ $isEditing ? 'Update Patient' : 'Save Patient' }}
                    </button>
                    <button type="button" wire:click="cancel" class="btn btn-secondary">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
