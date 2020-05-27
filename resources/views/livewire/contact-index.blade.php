<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (!$statusUpdate)
        <livewire:contact-create></livewire:contact-create>
    @else
        <livewire:contact-update></livewire:contact-update>
    @endif
    <div class="d-flex align-items-start flex-column bd-highlight mb-3">
        <input type="text" class="form-control w-50 ml-auto" placeholder="Cari" wire:model="search">
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>
                        <button wire:click="getContact({{ $data->id }})" type="button" class="btn btn-success text-white">Edit</button>
                        <button wire:click="destroy({{ $data->id }})" type="button" class="btn btn-danger text-white">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
