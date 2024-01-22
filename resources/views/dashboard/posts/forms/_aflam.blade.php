{{-- Name --}}
<div class="row mb-3">
    <label for="title" class="col-md-3 col-form-label">عنوان المنشور</label>
    <div class="col-md-9">
        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}">
        @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Category --}}
<div class="row mb-3">
    <label for="category_id" class="col-md-3 col-form-label">القسم</label>
    <div class="col-md-9">
        @php
            $parentId = \App\Models\Category::where('slug', request()->get('type'))->first()->id;
            $categories = \App\Models\Category::whereParentId($parentId)->get();
        @endphp
        @if ($categories->count() > 0)
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="" hidden>-- اختار --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : false }}>{{ $category->name }}</option>
                @endforeach
            </select>
        @else
            <p>لا توجد اقسام فرعية. <a href="{{ route('category.create') }}" class="text-link">اضف قسم فرعي اولا</a></p>
        @endif
        @error('category_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Year --}}
<div class="row mb-3">
    <label for="year" class="col-md-3 col-form-label">سنة الإنتاج</label>
    <div class="col-md-9">
        <select id="year" name="year" class="form-control @error('year') is-invalid @enderror">
            <option value="">--اختار--</option>
            @for ($i = date('Y'); $i >= 1900; $i--)
                <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : false }}>{{ $i }}
                </option>
            @endfor
        </select>
        @error('year')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Quality --}}
<div class="row mb-3">
    <label for="quality" class="col-md-3 col-form-label">الجودة</label>
    <div class="col-md-9">
        <select id="quality" name="quality" class="form-control @error('quality') is-invalid @enderror">
            <option value="">--اختار--</option>
            @foreach (DataArray::QUALITIES as $key => $value)
                <option value="{{ $key }}" {{ old('quality') == $key ? 'selected' : false }}>
                    {{ $value }}</option>
            @endforeach
        </select>
        @error('quality')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Description --}}
<div class="row mb-3">
    <label for="description" class="col-md-3 col-form-label">وصف مختصر</label>
    <div class="col-md-9">
        <textarea name="description" maxlength="500" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
        @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Image --}}
<div class="row mb-3">
    <label for="image" class="col-md-3 col-form-label">الصورة التوضيحية</label>
    <div class="col-md-9">
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Actress --}}
<div class="row mb-3">
    <label for="actress" class="col-md-3 col-form-label">الممثلين</label>
    <div class="col-md-9">
        <select id="actress" name="actress[]" class="form-control select2 @error('actress') is-invalid @enderror"
            multiple>
            <option value="">--اختار--</option>
            @foreach (\App\Models\Actress::get() as $actress)
                <option value="{{ $actress->id }}" {{ old('actress') == $actress->id ? 'selected' : false }}>
                    {{ $actress->name }}</option>
            @endforeach
        </select>
        @error('actress')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Download Links --}}
<div class="row mb-3">
    <label for="link_1" class="col-md-3 col-form-label">روابط التحميل</label>
    <div class="col-md-9">
        <div class="download-link-inputs">
            <input type="text" id="link_1" name="links[]" class="form-control mb-3 @error('links.*') is-invalid @enderror">
        </div>
        @error('links.*')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="button" id="add" class="btn btn-sm btn-default mt-3">اضف رابط آخر</button>
    </div>
</div>

{{-- Submit --}}
<div class="row border-top pt-3 mt-3">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <button type="submit" class="btn btn-primary">حفظ ونشر</button>
    </div>
</div>
