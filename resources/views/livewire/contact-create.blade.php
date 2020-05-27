<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input
                        id="name"
                        wire:model="name"
                        class="form-control @error('name') is-invalid @enderror"
                        type="text" name="name" placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input
                        id="name"
                        wire:model="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        type="text" name="phone" placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
