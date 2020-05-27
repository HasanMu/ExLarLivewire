<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shopping Cart</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($cart['products'] as $item)
                            <li class="list-group-item">
                                <span>{{ $item->name.' | Price : '.$item->price }}</span>

                                <div class="float-right">
                                    <button wire:click="removeItem({{ $item->id }})" class="btn btn-danger">Remove</button>
                                </div>

                            </li>
                        @empty

                        @endforelse
                    </ul>
                </div>
                <div class="card-footer">
                    @if ($cart['products'])
                        <button wire:click="checkout" class="btn btn-success float-right">
                            Checkout
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
