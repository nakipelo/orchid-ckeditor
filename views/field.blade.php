@component($typeForm, get_defined_vars())
    <div data-controller="ckeditor"
         data-ckeditor-id-value="{{ $id }}"
         data-ckeditor-options-value="{{ json_encode($options, flags: JSON_FORCE_OBJECT) }}"
         data-ckeditor-editor-url-value="{{ config('ckeditor.editorUrl') }}"
    >
        <div data-ckeditor-target="editor"></div>

        <input id="{{ $id }}"
               data-ckeditor-target="input"
               name="{{ $name }}"
               type="hidden"
               class="form-control"
               value="{{ $value ?? '' }}"
        />
    </div>
@endcomponent
