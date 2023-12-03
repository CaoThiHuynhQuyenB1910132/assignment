<div>
    <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#standard-modal">
        <i class="mdi mdi-plus-circle me-2"></i> Add Coupon
    </button>

    <div wire:ignore.self id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Create Coupon</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form wire:submit.prevent="createCoupon">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name">Coupon Code</label>
                                <input
                                    wire:model="code"
                                    name="code"
                                    id="code"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter code">

                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <span wire:click="generateCode" style="cursor:pointer;" class="link-info">Click here to generate code</span>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="amount">Amount</label>
                                <input
                                    wire:model="amount"
                                    name="amount"
                                    id="amount"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter amount">

                                @error('amount')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="type">Type</label>
                                <select
                                    wire:model="type"
                                    name="type"
                                    id="type"
                                    class="form-select">
                                    <option selected>Choose A Type</option>
                                    <option value="percent">Percent</option>
                                    <option value="fixed">Fixed</option>
                                </select>

                                @error('type')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="amount">Discount Price</label>
                                <input
                                    wire:model="discountPrice"
                                    name="discountPrice"
                                    id="discountPrice"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter amount">

                                @error('discountPrice')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
