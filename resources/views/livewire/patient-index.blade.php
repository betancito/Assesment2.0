<div class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="card w-75">
        <div class="card-header">
            <h3 class="card-title">Patients</h3>
        </div>
        <div class="card-body">
            
            <div class="mb-3">
                <button wire:click="create" class="btn btn-primary">
                    Add New Patient
                </button>
            </div>

            @if(count($patients) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient['name'] }}</td>
                                    <td>{{ $patient['email'] }}</td>
                                    <td>{{ $patient['dob'] }}</td>
                                    <td>{{ $patient['phone'] }}</td>
                                    <td>{{ $patient['address'] }}</td>
                                    <td>
                                        <button wire:click="edit({{ $patient['id'] }})" class="btn btn-warning btn-sm">
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $patient['id'] }})" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">No patients found.</p>
            @endif
        </div>
    </div>
</div>
