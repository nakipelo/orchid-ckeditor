@component($typeForm, get_defined_vars())
<div data-controller="ckeditor" data-ckeditor-id-value="{{ $id }}" data-ckeditor-options-value="{{ json_encode(config('ckeditor.options')) }}">
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control">{!! old('content', $value) !!}</textarea>
</div>
@endcomponent