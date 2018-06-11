

<div class="form-group">
    <label for="category">Category<span class="required">*</span></label>
    <input placeholder="Enter category"
            id="category"
            required
            name="category"
            class="form-control p-3"
            @if(isset($category))
            value="{{$category->category}}"
            @endif
            />
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit"/>
</div>
