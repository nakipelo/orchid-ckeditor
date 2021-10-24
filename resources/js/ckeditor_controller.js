import { Controller } from '@hotwired/stimulus'
import { getEditorNamespace } from 'ckeditor4-integrations-common'
import { useMeta } from "stimulus-use"

function typeReader(type) {
	if (!['classic', 'inline'].includes(type)) {
		throw new Error('Allow only "classic" or "inline" type')
	}

	return type
}

export default class extends Controller {
	static metaNames = ['csrf_token']

	static values = {
		options: {
			type: Object,
			default: {},
		},
		type: {
			String,
			default: 'classic',
			reader: typeReader,
		},
		editorUrl: {
			type: String,
			default: '//cdn.ckeditor.com/4.6.2/full/ckeditor.js',
		},
	}

	static targets = [
		'editor',
		'input',
	]

	initialize() {
		useMeta(this)
	}

	async connect() {
		try {
			// Дожидаемся CKE
			await getEditorNamespace(this.editorUrlValue)

			const method = this.typeValue === 'inline' ? 'inline' : 'replace'

			const options = this.optionsValue

			this.editor = CKEDITOR[ method ](
				this.editorTarget,
				options
			)

			this.editor.on('instanceReady', () => {
				this.editor.on('change', () => {
					const data = this.editor.getData()

					if (this.inputTarget.value !== data) {
						this.inputTarget.value = data
					}
				})

				this.editor.setData(this.inputTarget.value)
			})
		} catch (error) {
			console.error(error)
		}

		this.maximizeClose = () => {
			if (this.editor) {
				const command = this.editor.getCommand('maximize')
				if (command.state === CKEDITOR.TRISTATE_ON) {
					this.editor.execCommand('maximize')
				}
			}
		}

		addEventListener('popstate', this.maximizeClose)
	}

	disconnect() {
		removeEventListener('popstate', this.maximizeClose)
		this.editor?.destroy()
	}
}