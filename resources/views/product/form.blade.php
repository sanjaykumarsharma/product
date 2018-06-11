
<div class="form-group">
    <label for="category">Category<span class="required">*</span></label>
    <select class="form-control" id="category_id" name="category_id">
        @foreach($categories as $c)
            @if(isset($product))
            <option value="{{ $c->id }}" {{ ($c->id == $product->category_id) ? 'selected' : '' }}>{{ $c->category }}</option>
            @else
            <option value="{{ $c->id }}" >{{ $c->category }}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="slug">Slug<span class="required">*</span></label>
    <input placeholder="Enter slug"
            id="slug"
            required
            name="slug"
            class="form-control p-3"
            @if(isset($product))
            value="{{$product->slug}}"
            @endif
            />
</div>

<div class="form-group">
    <label for="product_name">Product Nmae<span class="required">*</span></label>
    <input placeholder="Enter product name"
            id="product_name"
            required
            name="product_name"
            class="form-control p-3"
            @if(isset($product))
            value="{{$product->product_name}}"
            @endif
            />
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea placeholder="Enter description"
            id="description"
            required
            name="description"
            class="form-control p-3"
            >@if(isset($product)) {{$product->description}} @endif
            </textarea>
</div>

<div class="form-group">
    <label for="image">Image</label>
    @if(isset($product))
        <img src="{{asset('images/'.$product->image)}}" class="img-responsive" style="max-width:25px">
    @endif
    <input type="file" name="image" class="form-control" accept="image/*">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit"/>
</div>
