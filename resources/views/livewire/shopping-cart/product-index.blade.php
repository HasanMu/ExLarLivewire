<div class="container">
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control mb-3" placeholder="Search somethins ..." wire:model="search">
        </div>
        @foreach ($products as $data)
            <div class="col-md-3 mt-2">
                <div class="card">
                    <div class="card-header">{{ $data->name }}</div>
                    <div class="card-body">{{ $data->description }}</div>
                    <div class="card-footer">
                        <button wire:click="addToCart({{ $data->id }})" class="btn btn-success">Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $products->links() }}
    </div>
</div>
