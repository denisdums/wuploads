import NiceSelect from "nice-select2/src/js/nice-select2";
import "nice-select2/src/scss/nice-select2.scss";

export function WuploadForm() {
    return {
        distantUrlInput: '',
        localUrlInput: '',
        outputResult: '',
        typeSelect: '',

        init() {
            this.$el.addEventListener('submit', this.submit.bind(this));
            this.distantUrlInput = this.$el.querySelector("[name='distantUrl']");
            this.localUrlInput = this.$el.querySelector("[name='localUrl']");
            this.outputResult = this.$el.querySelector("#wuploads_result");

            this.typeSelect = this.$el.querySelector("[name='type']");
            this.typeSelectRender = new NiceSelect(this.typeSelect, {searchable: false});
        },

        async submit(e) {
            e.preventDefault()

            const data = new FormData();
            data.append("distant", this.distantUrlInput.value);
            data.append("local", this.localUrlInput.value);
            data.append("type", this.typeSelect.value);

            const call = await fetch("http://wuploads.docker/api/", {
                method: "POST",
                body: data,
            });
            console.log(call);
            const response = await call.json()
            console.log(response);

            this.outputResult.innerHTML = response.content;
            this.outputResult.classList.add('active');
        }
    }
}
