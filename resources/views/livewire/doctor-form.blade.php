<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Doctor Information</h4>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty</label>
                    <input type="text" id="specialty" class="form-control" wire:model="specialty">
                    @error('specialty') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="license_number" class="form-label">License Number</label>
                    <input type="text" id="license_number" class="form-control" wire:model="license_number">
                    @error('license_number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="experience_years" class="form-label">Years of Experience</label>
                    <input type="number" id="experience_years" class="form-control" wire:model="experience_years">
                    @error('experience_years') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Details</button>
            </form>
        </div>
    </div>
</div>
