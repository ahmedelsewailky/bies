{{-- Name --}}
<div class="row mb-3">
    <label for="title" class="col-md-3 col-form-label">العنوان</label>
    <div class="col-md-9">
        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}" placeholder="تحميل برنامج ميكروسوفت اوفيس 2019 كامل ومفعل مدي الحياة">
        @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Category --}}
<div class="row mb-3">
    <label for="category_id" class="col-md-3 col-form-label">القسم</label>
    <div class="col-md-9">
        <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="2">برامج</option>
        </select>
        @error('category_id')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Year --}}
<div class="row mb-3">
    <label for="year" class="col-md-3 col-form-label">سنة الإصدار</label>
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

{{-- Description --}}
<div class="row mb-3">
    <label for="description" class="col-md-3 col-form-label">التفاصيل</label>
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

{{-- Download Links --}}
<div class="row mb-3">
    <label for="link_1" class="col-md-3 col-form-label">روابط التحميل</label>
    <div class="col-md-9">
        <div class="download-link-inputs">
            <input type="text" id="link_1" name="links[]" class="form-control mb-3 @error('links.*') is-invalid @enderror">
            @error('links.*')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
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
