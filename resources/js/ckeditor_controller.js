application.register('ckeditor', class extends window.Controller {
	static values = {
		id: String,
		options: Object,
	}

	connect() {
		CKEDITOR.replace(this.idValue, this.optionsValue)
	}

	disconnect() {
		if(CKEDITOR.instances[this.idValue]) {
			CKEDITOR.instances[this.idValue].destroy()
		}
	}
})