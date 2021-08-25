application.register('ckeditor', class extends window.Controller {
	static values = {
		id: String,
		options: Object,
	}

	connect() {
		CKEDITOR.replace(this.idValue, this.optionsValue)
	}
})